@extends('layouts.admin')

@section('content')

    <div class="project">

        <div class="container my-3">
            <h1>Lista Progetti | <a class="btn btn-success" href="{{ route("admin.projects.create") }}"><i class="fa-solid fa-plus"></i></a> </h1>

            @if (session("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Durata progetto</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->project_duration }} giorni</td>
                            <td>
                                <a class="btn btn-success" href="{{ route("admin.projects.show", $project) }}"><i class="fa-solid fa-circle-info"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $projects->links() }}

        </div>
    </div>

@endsection
