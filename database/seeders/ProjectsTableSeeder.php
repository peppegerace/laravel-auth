<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $new_project = new Project();
            $new_project->name = $faker->sentence(2);
            // $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);
            $new_project->description = $faker->text();
            $new_project->project_duration = $faker->randomDigit();

            $new_project->save();
        }
        // dump($new_project);
    }
}
