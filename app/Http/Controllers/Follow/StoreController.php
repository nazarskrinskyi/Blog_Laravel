<?php

namespace App\Http\Controllers\Follow;


use App\Http\Controllers\Controller;
use App\Models\UserProfile;

class StoreController extends Controller
{
    public function __invoke(UserProfile $profile)
    {
        auth()->user()->followers()->toggle($profile->id);
        return redirect()->back();
    }
}
