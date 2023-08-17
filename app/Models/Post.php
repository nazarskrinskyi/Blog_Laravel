<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static find(int $int)
 * @method static firstOrCreate(string[] $array, array $anotherPost)
 * @method static updateOrCreate(string[] $array, array $anotherPost)
 * @method static findOrFail(int $id)
 * @method static filter($filter)
 * @property mixed $id
 */
class Post extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;
    protected $withCount = ['likedUsers'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->BelongsToMany(User::class,'post_user_likes','post_id','user_id');
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
