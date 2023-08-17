<?php

namespace App\Http\Controllers\Post\Comment;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(Post $post, StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);
        return redirect()->back();
    }
}
