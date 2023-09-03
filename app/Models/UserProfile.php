<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserProfile extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class,'user_id', 'id');
    }

    public function followers(): hasMany
    {
        return $this->hasMany(Follower::class, 'follower_id', 'id');
    }

    protected $guarded = false;
    protected $table = 'user_profiles';
}
