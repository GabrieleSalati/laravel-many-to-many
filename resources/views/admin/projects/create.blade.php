@extends('layouts.app')

@section('actions')
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to Projects</a>
@endsection

@section('content')
    @include('layouts.partials.errors')

    <div>
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}" placeholder="Insert title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="technology_id" class="form-label">Technology</label>
                <select name="technology_id" id="technology_id" class="form-select" aria-label="Default select example">
                    <option selected>Select tech</option>
                    @foreach ($technologies as $technology)
                        <option @if (old('techonology_id', $project->technology_id) == $technology->id)  @endif value="{{ $technology->id }}">
                            {{ $technology->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                @foreach ($types as $type)
                    <label for="type" class="form-label">{{ $type->label }}</label><input type="checkbox"
                        name="type" id="type">
                @endforeach
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
                    placeholder="Add link" value="{{ old('link') }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Choose image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
@endsection
