{{-- @php
    use App\Function\Helper;
@endphp --}}

@extends('layouts.admin')

@section('content')

<div class="container my-5">

    <div class="card">
        <img src="{{ asset("storage/" . $project->image) }}" alt="{{ $project->name }}">
        <p>{{ $project->image_original_name }}</p>
        <h5 class="card-header">{{ $project->name }}</h5>
        <div class="card-body">
          <h5 class="card-title">Durata progetto: {{ $project->project_duration }} giorni</h5>
          <p class="card-text">Descrizione: {{ $project->description }}</p>
          <a href=""{{ route("admin.projects.edit", $project) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

</div>
@endsection
