@extends('layouts.personal')

@section('content')
<h1 class="text-center">Edit Comment</h1>
<div class="row justify-content-center mt-4">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="POST" action="{{ route('personal.comment.update',$comment->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="comment" class="form-label">Content</label>
                <textarea type="text" id="comment" autocomplete="on" class="form-control" name="content">{{ $comment->content }}</textarea>
            </div>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
