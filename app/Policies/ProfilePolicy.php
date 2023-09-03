<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;

class ProfilePolicy
{
    public function __construct()
    {
    }

    private function verifyUserProfile(UserProfile $profile): RedirectResponse|bool
    {
        $verify = UserProfile::where('user_id', auth()->user()->id)
            ->where('id', $profile->id)
            ->first();

        if (is_null($verify)) {
            abort(404);
        }

        return true;
    }

    public function update(User $user, UserProfile $profile): bool
    {
        $this->verifyUserProfile($profile);
        return true;
    }

    public function delete(User $user, UserProfile $profile): bool
    {
        $this->verifyUserProfile($profile);
        return true;
    }

    public function edit(User $user, UserProfile $profile): bool
    {
        $this->verifyUserProfile($profile);
        return true;
    }




}
