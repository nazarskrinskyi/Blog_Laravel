<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Tag\BaseController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
