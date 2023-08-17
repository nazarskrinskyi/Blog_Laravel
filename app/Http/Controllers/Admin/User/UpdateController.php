<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(User $user, UpdateRequest $request)
    {
        $data = $request->validated();
        $user = $this->service->update($data, $user);
        return redirect()->route('admin.user.show', $user->id);
    }
}
