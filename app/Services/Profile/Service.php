<?php

namespace App\Services\Profile;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function randomFresh($data)
    {
        if ($data->count() >= 4) {
            $randomData = $data->random(4);
        } elseif ($data->count() > 0) {
            $randomData = $data->random($data->count());
        } else {
            $randomData = collect(); // Empty collection
        }

        return $randomData;
    }
    public function randomFollowers(UserProfile $profile)
    {
        $followers = [];
        foreach ($profile->followers as $follower) {
            $followers[] = UserProfile::where('user_id', '=', $follower->user_id)->get()->first();
        }
        if (count($followers) >= 4) {
            $randomData = collect($followers)->random(4);
        } elseif (count($followers) > 0) {
            $randomData = collect($followers)->random(count($followers));
        } else {
            $randomData = collect(); // Empty collection
        }

        return $randomData;
    }


    public function update(array $data, UserProfile $profile): UserProfile|string
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }

            $profile->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $profile;
    }


}
