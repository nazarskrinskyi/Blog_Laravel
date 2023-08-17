<?php

namespace App\Http\Controllers\Post\CommentReplyLike;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(CommentReply $reply): RedirectResponse
    {
        auth()->user()->likedReplies()->toggle($reply->id);
        return redirect()->back();
    }
}
