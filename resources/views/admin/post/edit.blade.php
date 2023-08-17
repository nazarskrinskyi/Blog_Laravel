@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Edit Post</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="POST" action="{{ route('admin.post.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" autocomplete="on" class="form-control" name="title"
                           placeholder="title..." value="{{ $post->title }}">
                    @error('title')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="summernote" class="form-label">Content</label>
                    <textarea type="text" id="summernote" class="form-control"
                              name="content" placeholder="content..." autocomplete="on">{{ $post->content }}</textarea>
                    @error('content')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label">{{ old('image') ?? "Choose file"}}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('image')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="likes" class="form-label">Likes</label>
                    <input type="number" id="likes" class="form-control -mouse-pointer"
                           name="likes" autocomplete="on" value="{{ $post->likes }}"
                    >
                    @error('likes')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="tags" class="form-label">Tags</label>
                        <select id="tags" name="tags[]" class="select2-primary select2-cyan w-100" multiple="multiple"
                                data-placeholder="Choose Tags">
                            @foreach($tags as $tag)
                                <option
                                    value="{{ $tag->id }}"
                                    @foreach($post_tags as $post_tag)
                                        {{ $post_tag->tag_id == $tag->id ? 'selected' : '' }}
                                        @endforeach>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                           name="is_published" autocomplete="on"
                           value="1" {{ $post->is_published === 1 ? 'checked' : '' }}
                    >
                    <label for="usability" class="form-check-label">Is Publish</label>
                    @error('is_published')
                    <strong class="text-danger">{{ $message  }}</strong>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Edit</button>
            </form>
        </div>
    </div>
@endsection
