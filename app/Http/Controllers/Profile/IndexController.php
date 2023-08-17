<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

use App\Models\UserProfile;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $profile = UserProfile::where('user_id',auth()->user()->id)->first();
        return view('profile.index', compact('profile'));
    }


}
