<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(): View
    {
        $auth = Auth::user();

        $posts = Post::where('user_id', '=', auth()->user()->id)->get();

        $randomPosts = $this->service->randomFresh($posts);

        $profile = UserProfile::where('user_id', auth()->user()->id)->first();

        $randomFollowers = $this->service->randomFollowers($profile);

        return view('profile.index', compact('profile', 'auth', 'randomPosts', 'randomFollowers'));
    }


}
