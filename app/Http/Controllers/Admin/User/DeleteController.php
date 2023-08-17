<?php

namespace App\Http\Controllers\Admin\User;


use App\Models\User;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
