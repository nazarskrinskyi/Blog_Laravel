<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(UserProfile $profile): \Illuminate\Http\RedirectResponse|View
    {
        if (auth()->user()->id === $profile->user_id) {
            return redirect()->route('profile.index');
        }

        $auth = Auth::user();

        $posts = Post::where('user_id', '=', $profile->user_id)->get();

        $randomPosts = $this->service->randomFresh($posts);

        $randomFollowers = $this->service->randomFollowers($profile);
        return view('profile.show', compact('profile', 'auth', 'randomPosts', 'randomFollowers'));
    }


}
