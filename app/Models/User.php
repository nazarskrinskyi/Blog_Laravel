<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    const ROLE_ADMIN = "admin";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
    public function profile()
    {
        return $this->BelongsTo(UserProfile::class,'user_id', 'id',);
    }
    public function followers()
    {
        return $this->belongsToMany(UserProfile::class, 'followers','user_id','follower_id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes','user_id','post_id');
    }
    public function likedComments()
    {
        return $this->belongsToMany(Comment::class, 'comment_likes','user_id','comment_id');
    }
    public function likedReplies()
    {
        return $this->belongsToMany(CommentReply::class, 'comment_reply_likes','user_id','reply_id');
    }

    public function commentedPosts()
    {
        return $this->hasMany(Comment::class, 'user_id','id');
    }
    public function repliedComments()
    {
        return $this->hasMany(CommentReply::class, 'user_id','id');
    }


}
