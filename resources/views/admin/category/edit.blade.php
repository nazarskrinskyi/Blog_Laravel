@extends('layouts.admin')

@section('content')
<h1 class="text-center">Edit Category</h1>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Category Title</label>
                <input type="text" id="title" autocomplete="on" class="form-control" name="title"
                       value="{{ $category->title }}">
            </div>
            @error('title')
            <div class="text-danger">{{ $message  }}</div>
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea type="text" id="description" class="form-control"
                          name="description" autocomplete="on">{{ $category->description }}</textarea>
            </div>
            @error('description')
            <div class="text-danger">{{ $message  }}</div>
            @enderror

            <div class="mb-3" style="margin-left: 20px">
                <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                       name="status" autocomplete="on"
                       value="1" <?= $category->status == 1 ? 'checked' : '' ?>>
                <label for="usability" class="form-check-label">Visible</label>
            </div>
            @error('status')
            <div class="text-danger">{{ $message  }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
