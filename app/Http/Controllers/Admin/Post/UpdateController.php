<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        if (isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images',$data['image']);
        $post = $this->service->update($data, $post);
        return redirect()->route('admin.post.show', $post->id);
    }
}
