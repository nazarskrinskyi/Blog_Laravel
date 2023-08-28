<?php

namespace App\Http\Controllers\Practise;

use App\Http\Controllers\Controller;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(UserProfile $profile): View
    {
        //if (isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images',$data['image']);

        return view('profile.show', compact('profile'));
    }



}
