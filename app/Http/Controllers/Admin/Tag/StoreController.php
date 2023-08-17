<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Category\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {

        $data = $request->validated();
        $tag = $this->service->store($data);
        return redirect()->route('admin.tag.index', $tag->id);
    }
}
