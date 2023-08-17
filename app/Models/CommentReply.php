<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    use Filterable;


    protected $table = 'comment_replies';
    protected $guarded = false;
    protected $withCount = ['likedComments'];


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function likedComments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Comment::class,'comment_likes','comment_id','user_id');
    }

}
