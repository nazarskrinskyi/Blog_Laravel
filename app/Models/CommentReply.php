<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentReply extends Model
{
    use HasFactory;
    use Filterable;


    protected $table = 'comment_replies';
    protected $guarded = false;
    protected $withCount = ['likedComments','likedReplies'];



    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }
    public function profile(): BelongsTo
    {
        return $this->BelongsTo(UserProfile::class,'user_id', 'user_id');
    }

    public function likedComments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Comment::class,'comment_likes','comment_id','user_id');
    }

    public function likedReplies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CommentReplyLike::class, 'reply_id', 'id');
    }

}
