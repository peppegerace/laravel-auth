@extends("layouts.admin")

@section("content")

    <div class="container my-5">

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mb-4">{{ $name }}</h1>
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="mb-3">
                <label for="name" class="form-label">Titolo</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name", $project?->name) }}">
                @error("name")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" value="{{ old("image", $project?->image) }}">
                @error("image")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                @if ($project)
                    @dump($project)
                    <img src="{{ asset("storage/" . $project->image) }}"/>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error("description") is-invalid @enderror" id="description" rows="3" name="description">{{ old("description",$project?->description)  }}</textarea>
                @error("description")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_duration" class="form-label">Durata progetto (in giorni)</label>
                <input type="text" class="form-control @error("project_duration") is-invalid @enderror" id="project_duration" name="project_duration"value="{{ old("project_duration", $project?->project_duration) }}">
                @error("project_duration")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </form>

    </div>

@endsection
