<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\UpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;

class UpdateController
{
    public function __invoke(UpdateRequest $request, UserProfile $profile): UserProfile
    {
        $data = $request->validated();
        $profile->update($data);
        return $profile;
    }
}
