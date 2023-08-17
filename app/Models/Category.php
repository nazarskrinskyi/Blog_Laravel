<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $int)
 * @method static filter(mixed $filter)
 */
class Category extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;


    protected $fillable = ['title', 'description', 'status'];
    protected $table = 'categories';
    protected $guarded = false;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
