<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy("id")->paginate(10);
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = "Inserimento nuovo progetto";
        $method = "POST";
        $route = route('admin.projects.store');
        $project = null;
        return view('admin.projects.create-edit', compact("name", "method", "route", "project"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Helper::generateSlug($form_data['name'], Project::class);
        $form_data['project_duration'] = (string) $form_data['project_duration'];

        if(array_key_exists("image", $form_data)) {
            $form_data["image_original_name"] = $request->file("image")->getClientOriginalName();
            $form_data["image"] = Storage::put("uploads", $form_data["image"]);
        }

        $new_project = Project::create($form_data);

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $name = "Modifica progetto";
        $method = "PUT";
        $route = route('admin.projects.update', $project);
        return view('admin.projects.create-edit', compact("name","method", "route", "project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if($form_data["name"]!= $project->name){
            $form_data["name"] = Helper::generateSlug($form_data["name"], Project::class);
        }else{
            $form_data["slug"] = $project->slug;
        }

        if(array_key_exists("image", $form_data)){
            if($project->image){
                Storage::disk("public")->delete($project->image);
            }

            $form_data["image_original_name"] = $request->file("image")->getClientOriginalName();
            $form_data["image"] = Storage::put("uploads", $form_data["image"]);
        }


        $project->update($form_data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->image){
            Storage::disk("public")->delete($project->image);
        }

        $project->delete();
        return redirect()->route("admin.projects.index")->with("success", "Il progetto è stato eliminato correttamente");
    }
}
