<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images',$data['image']);
        $data['user_id'] = auth()->user()->id;
        $post = $this->service->store($data);
        return redirect()->route('admin.post.index', $post->id);
    }
}
