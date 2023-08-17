@extends('layouts.admin')

@section('content')
<h1 class="text-center">Create Tag</h1>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="post" action="{{ route('admin.tag.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" autocomplete="on" class="form-control" name="title"
                       placeholder="title..." value="{{ old('title') }}">
                @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
</div>
@endsection
