<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class Service
{
    public function update(array $data, User $post): User|string
    {
        try {
            DB::beginTransaction();
            if (is_null($data['password'])) unset($data['password']);
            $post->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;

    }

    public function store(array $data): User|string
    {
        try {
            DB::beginTransaction();

            $post = User::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }


}
