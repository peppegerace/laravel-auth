@extends('layouts.admin')

@section('content')

<div class="container my-5">

    <div class="card">
        <h5 class="card-header">{{ $project->name }}</h5>
        <div class="card-body">
          <h5 class="card-title">Durata progetto: {{ $project->project_duration }} giorni</h5>
          <p class="card-text">Descrizione: {{ $project->description }}</p>
          <a href="#" class="btn btn-primary">X</a>
        </div>
    </div>

</div>
@endsection
