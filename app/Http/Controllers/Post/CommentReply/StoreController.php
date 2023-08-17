<?php

namespace App\Http\Controllers\Post\CommentReply;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Post\CommentReply\StoreRequest;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(Comment $comment, StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['comment_id'] = $comment->id;
        CommentReply::create($data);
        return redirect()->back();
    }
}
