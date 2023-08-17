<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Tag\BaseController;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Comment $comment): RedirectResponse
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
}
