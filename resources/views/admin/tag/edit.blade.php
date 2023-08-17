@extends('layouts.admin')

@section('content')
<h1 class="text-center">Edit Tag</h1>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="POST" action="{{ route('admin.tag.update',$tag->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Category Title</label>
                <input type="text" id="title" autocomplete="on" class="form-control" name="title"
                       value="{{ $tag->title }}">
            </div>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
