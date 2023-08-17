<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Admin\Tag\BaseController;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Post $post): RedirectResponse
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }
}
