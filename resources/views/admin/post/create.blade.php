@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Create Post</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" autocomplete="on" class="form-control" name="title"
                           placeholder="title..." value="{{ old('title') }}">
                    @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="summernote" class="form-label">Content</label>
                    <textarea type="text" id="summernote" class="form-control"
                              name="content" placeholder="content..." autocomplete="on">{{ old('content') }}</textarea>
                    @error('content')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="likes" class="form-label">Likes</label>
                    <input type="number" id="likes" class="form-control"
                           name="likes" autocomplete="on" value="{{ old('likes') }}"
                    >
                    @error('likes')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category_id" class="form-control">
                        <option value="">Choose category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong>
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
                                @if(!empty(old('tags')))
                                    @foreach(old('tags') as $oldTag)
                                        {{ $oldTag == $tag->id ? 'selected' : '' }}
                                    @endforeach
                                @endif>
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('tags')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                           name="is_published" autocomplete="on" value="1" {{ old('is_published') ? 'checked' : '' }}
                    >
                    <label for="usability" class="form-check-label">Is Publish</label>
                    @error('is_published')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
        </div>
    </div>
@endsection
