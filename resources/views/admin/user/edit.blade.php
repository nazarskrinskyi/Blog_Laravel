@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Edit User</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <form method="POST" action="{{ route('admin.user.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" id="name" autocomplete="on" class="form-control" name="name"
                           placeholder="username..." value="{{ $user->name }}">
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control"
                           value="{{ $user->email }}" name="email" placeholder="email..." autocomplete="on">
                    @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control"
                           name="password" placeholder="password..." autocomplete="on">
                    @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="passwordVerify" class="form-label">PasswordVerify</label>
                    <input type="password" id="passwordVerify" class="form-control"
                           name="passwordVerify" placeholder="passwordVerify..." autocomplete="on">
                    @error('passwordVerify')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mb-3" style="margin-left: 20px">
                    <input type="checkbox" id="role" class="form-check-input -mouse-pointer"
                           name="role" autocomplete="on" value="admin" {{ $user->role === "admin" ? 'checked' : '' }}>
                    <label for="role" class="form-check-label">Admin</label>
                    @error('role')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Edit</button>
            </form>
        </div>
    </div>
@endsection
