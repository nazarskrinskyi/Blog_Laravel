<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'comments';
    protected $guarded = false;
    protected $withCount = ['likedComments'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class,'user_id', 'id');
    }

    public function getDateAsCarbonAttr(): Carbon
    {
        return Carbon::parse($this->created_at);
    }

    public function likedComments(): HasMany
    {
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(CommentReply::class, 'comment_id', 'id');
    }


}
