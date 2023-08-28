<?php

namespace App\Http\Controllers\Practise;

use App\Http\Controllers\Controller;

use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DeleteController extends Controller
{
    public function __invoke(UserProfile $profile): RedirectResponse
    {
        $profile->delete();
        return redirect()->route('login');
    }



}
