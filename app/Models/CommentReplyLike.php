<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplyLike extends Model
{
    use HasFactory;


    protected $table = 'comment_reply_likes';
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reply()
    {
        return $this->belongsTo(CommentReply::class);
    }
}
