<?php

namespace App\Http\Controllers\Post\CommentLike;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(Comment $comment): RedirectResponse
    {
        auth()->user()->likedComments()->toggle($comment->id);
        return redirect()->back();
    }
}
