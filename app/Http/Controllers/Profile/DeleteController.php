<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserProfile;
use App\Policies\ProfilePolicy;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(UserProfile $profile): RedirectResponse
    {
        $this->authorize('delete', $profile);
        $profile->delete();
        User::destroy($profile->user_id);
        return redirect()->route('login');
    }



}
