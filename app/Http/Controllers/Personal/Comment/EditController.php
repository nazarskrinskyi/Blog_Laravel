<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Tag\BaseController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Comment $comment): View
    {
        return view('personal.comment.edit', compact('comment'));
    }
}
