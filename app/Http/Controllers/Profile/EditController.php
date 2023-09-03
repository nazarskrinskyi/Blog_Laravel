<?php

namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Admin\User\BaseController;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(UserProfile $profile): View
    {
        $this->authorize('edit', $profile);

        $auth = Auth::user();

        return view('profile.edit', compact('profile', 'auth'));
    }
}
