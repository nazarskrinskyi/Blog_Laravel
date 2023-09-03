@extends('layouts.profile')

@section('content')
    <style>
        body {
            color: #1a202c;
            text-align: left;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm > .col, .gutters-sm > [class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }


        .h-100 {
            height: 100% !important;
        }

        .profile-image-container {
            min-height: 100px; /* Adjust this value to your desired image height */
            margin: auto;
        }

        .profile-image-container img {
            min-height: 100px;
            width: 100%;
            height: auto;
        }


    </style>

    <div id="app">
        <div class="main-body">
            <!-- Breadcrumb -->
            <div style="position: relative">
                <nav aria-label="breadcrumb" class="main-breadcrumb"
                     style="background: whitesmoke;padding: 1px 0 1px 20px;border-radius: 3px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" style="margin-top: 15px;"><a href="{{ route('home') }}"
                                                                                 class=" btn btn-outline-primary btn-sm"
                                                                                 style="text-decoration: none;font-size: large">Home</a>
                        </li>
                        <!-- Navbar -->
                        <!-- Left navbar links -->
                        <li class="nav-item ">
                            <button style=" margin-left: 10px;margin-top: 15px" class="btn btn-outline-danger" onclick="goBack()">Go back</button>
                        </li>

                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>

                        <li aria-current="page">
                            <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-outline-warning"
                               style="position: absolute; right: 140px; bottom: 20px;">
                                Edit Account
                            </a>

                            <form method="POST" action="{{ route('profile.delete', $profile->id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-outline-danger"
                                        style="position: absolute; right: 10px; bottom: 20px">
                                    Delete Account
                                </button>
                            </form>
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="profile-image-container">
                                    @if(!$profile->image)
                                        <img class="rounded-circle" @if($profile->description) style="min-height: 300px"
                                             @endif
                                             src="{{ asset('storage/images/user-avatar-filled.svg') }}" alt="set photo">
                                    @else
                                        <img class="rounded-circle" @if($profile->description) style="min-height: 300px"
                                             @endif
                                             src="{{ asset('storage/' . $profile->image) }}" alt="set photo">
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <!-- Check if $profile is not null before accessing its properties -->
                                    <h4>{{ $profile !== null ? $profile->full_name : '' }}</h4>
                                    <p class="text-secondary mb-1">{{ $profile->description ?? 'Nan personal info' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-send mr-2 icon-inline">
                                        <path d="M22 2L11 13"></path>
                                        <path d="M22 2L15 22L11 13L2 9L22 2Z"></path>
                                    </svg>
                                    Telegram
                                </h6>
                                <span class="text-secondary">{{ $profile->telegram ?? 'NaN' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>
                                    Twitter
                                </h6>
                                <span class="text-secondary">{{ $profile->twitter ?? 'NaN' }}</span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                    Instagram
                                </h6>
                                <span class="text-secondary">{{ $profile->instagram ?? 'NaN' }}</span>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path
                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                    Facebook
                                </h6>
                                <span class="text-secondary">{{ $profile->facebook ?? 'NaN' }}</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-secondary">{{ $profile->full_name ?? 'NaN' }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-secondary">{{ $profile->phone_number ?? 'NaN' }}</span>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="text-secondary">{{ $profile->address ?? 'NaN' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Followers</i>
                                    </h6>
                                    @if(isset($followers[0]))
                                        @foreach($followers as $follower)
                                            <div class="d-flex mb-3">
                                                @if(!$follower->image)
                                                    <img class=" d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5"
                                                         style="width: 80px;height: 70px;margin-right: 15px"
                                                         src="{{ asset("storage/user-avatar-filled.svg") }}"
                                                         alt="Image Description">
                                                @else
                                                    <img class=" d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5"
                                                         style="width: 80px;height: 70px;margin-right: 15px"
                                                         src="{{ asset("storage/" . $follower->image) }}"
                                                         alt="Image Description">
                                                @endif

                                                <a href="{{ route('profile.show', $follower->id) }}" style="margin-top: 20px;"><span>{{ $follower->user->name }}</span></a>
                                            </div>
                                        @endforeach
                                    @else
                                        No One
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Popular
                                            Posts</i></h6>
                                    @if(isset($randomPosts[0]))
                                        @foreach($randomPosts as $post)
                                            <div class="d-flex mb-3">
                                                <img class=" d-flex g-width-5 g-height-5 rounded-circle g-mt-1 g-mr-5"
                                                     style="width: 80px;height: 70px;margin-right: 15px"
                                                     src="{{ asset("storage/" . $post->image) }}"
                                                     alt="Image Description">
                                                <a href="{{ route('post.show', $post->id) }}" style="margin-top: 20px;"><span>{{ $post->title }}</span></a>
                                            </div>
                                        @endforeach
                                    @else
                                        User has NaN
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
