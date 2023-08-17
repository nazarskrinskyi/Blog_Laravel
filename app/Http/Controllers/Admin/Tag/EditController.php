<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Tag $tag): View
    {
        return view('admin.tag.edit', compact('tag'));
    }
}
