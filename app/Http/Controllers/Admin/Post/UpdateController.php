<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request): RedirectResponse|string
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        return redirect()->route('admin.post.show', $post->id);
    }
}
