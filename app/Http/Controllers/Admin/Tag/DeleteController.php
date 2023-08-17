<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Tag $tag): RedirectResponse
    {

        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
