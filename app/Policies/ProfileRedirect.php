<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;

class ProfileRedirect
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function show(User $user, UserProfile $profile): bool
    {
        return !(auth()->user()->id === $profile->user_id);
    }

}
