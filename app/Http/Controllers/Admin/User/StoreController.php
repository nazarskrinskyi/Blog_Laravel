<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Jobs\StoreUserJob;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): UserResource|string
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data,$this->service);
        return redirect()->route('admin.user.index');
    }
}
