<?php

namespace App\Http\Controllers\Post\Like;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
