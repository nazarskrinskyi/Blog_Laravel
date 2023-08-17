<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use Database\Factories\PostUserLikeFactory;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Category::factory('15')->create();
//        $posts = Post::factory(70)->create();
        //$tags = Tag::factory('50')->create();
//
//        foreach ($posts as $post){
//            $tags_id = $tags->random(5)->pluck('id');
//            $post->tags()->attach($tags_id);
//        }
        PostUserLike::factory('50')->create();
        Comment::factory('30')->create();
    }
}
