<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\UpdateRequest;
use App\Models\UserProfile;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, UserProfile $profile)
    {
        $this->authorize('update', $profile);
        $data = $request->validated();
        $this->service->update($data, $profile);
        return redirect()->route('profile.index');
    }
}
