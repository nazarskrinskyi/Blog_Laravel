@extends('layouts.profile')

@section('content')
    <style>

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button:hover {
            background: #682773
        }

        .labels {
            font-size: 13px
        }

        .custom-file-input:hover, .custom-file-label:hover {
            cursor: pointer;
        }


    </style>
    <div class="container rounded bg-white mt-5 mb-5">
        <form method="POST" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if(!$profile->image)
                            <img class="rounded-circle mt-5" width="150px"
                                 src="{{ asset('storage/images/user-avatar-filled.svg') }}" alt="set photo">
                        @else
                            <img class="rounded-circle mt-5" width="150px"
                                 src="{{ asset('storage/' . $profile->image) }}" alt="set photo">
                        @endif
                        <span class="font-weight-bold">Profile Photo</span>
                        <div class="mt-3">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label">{{ old('image') ?? "Choose file"}}</label>
                                </div>
                            </div>
                            @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="row mt-3">
                            <h4 class="text-center">Personal Data</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3"><label class="labels">Full Name</label>
                                <input type="text" class="form-control" placeholder="full name"
                                       name="full_name" value="{{ $profile->full_name ?? '' }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="phone number"
                                       name="phone_number" value="{{ $profile->phone_number ?? '' }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" placeholder="address"
                                       name="address" value="{{ $profile->address ?? '' }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">About User</label>
                                <input type="text" class="form-control" placeholder="description"
                                       name="description" value="{{ $profile->description ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 py-5">
                            <h4 class="text-center">Social Data</h4>
                        <br>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Telegram</label>
                            <input type="text" class="form-control" placeholder="telegram" name="telegram"
                                   value="{{ $profile->telegram ?? '' }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Twitter</label>
                            <input type="text" class="form-control" placeholder="twitter" name="twitter"
                                   value="{{ $profile->twitter ?? '' }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Instagram</label>
                            <input type="text" class="form-control" placeholder="instagram" name="instagram"
                                   value="{{ $profile->instagram ?? '' }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Facebook</label>
                            <input type="text" class="form-control" placeholder="facebook" name="facebook"
                                   value="{{ $profile->facebook ?? '' }}">
                        </div>
                        <div class="mt-4 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
