<?php

namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function update(array $data, Tag $tag): Tag|string
    {
        try {
            DB::beginTransaction();
            $tag->update($data); // Use the update method on the $tag instance

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $tag;

    }

    public function store(array $data): Tag|string
    {
        try {
            DB::beginTransaction();
            $tag = Tag::create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $tag;
    }


}
