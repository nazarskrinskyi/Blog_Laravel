@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Create Category</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="post" action="{{ route('admin.category.store') }}">
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
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" id="description" class="form-control"
                              name="description" placeholder="description..."
                              autocomplete="on">{{ old('description') }}</textarea>
                    @error('content')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="usability" class="form-check-input -mouse-pointer"
                           name="status" autocomplete="on"
                           value="1"
                        @if(old('status') === null || old('status') !== null)
                            {{ old('status') ? 'checked' : '' }}
                        @endif
                    >
                    @error('status')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    <label for="usability" class="form-check-label">Visible</label>
                </div>


                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
        </div>
    </div>
@endsection
