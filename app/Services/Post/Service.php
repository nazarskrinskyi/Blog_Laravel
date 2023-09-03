<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function update(array $data, Post $post): Post|string
    {
        try {
            DB::beginTransaction();
            if (isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images',$data['image']);

            if (isset($data['tags'])) {
                $tags = $data['tags'];
                $tags_id = $this->getTagIdsUpdate($tags);
                $post->tags()->sync($tags_id);
                unset($data['tags']);
            }
            $data['is_published'] = $data['is_published'] ?? 0;
            $post->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;

    }

    public function store(array $data): Post|string
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) $data['image'] = Storage::disk('public')->put('/images',$data['image']);

            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            }

            $data['is_published'] = $data['is_published'] ?? 0;
            $post = Post::create($data);

            if (isset($tags)) {
                $tags_id = $this->getTagIds($tags);
                $post->tags()->attach($tags_id);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }


    private function getTagIds(array $tags): array
    {
        $tags_id = [];
        foreach ($tags as $tag_id) {
            $tag = !isset($tag_id) ? Tag::create($tag_id) : Tag::find($tag_id);
            $tags_id[] = $tag->id;
        }
        return $tags_id;
    }

    private function getTagIdsUpdate(array $tags): array
    {
        $tags_id = [];
        foreach ($tags as $tag) {
            if (!Tag::find($tag)) {
                $tag = Tag::create($tag);
            } else {
                $current_tag = Tag::find($tag);
                $current_tag->update();
                $tag = $current_tag->fresh();
            }
            $tags_id[] = $tag->id;
        }
        return $tags_id;
    }


}
