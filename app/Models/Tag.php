<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static filter(mixed $filter)
 */
class Tag extends Model
{
    use Filterable;
    use HasFactory;
    protected $table = 'tags';
    protected $guarded = false;

    public function posts(): belongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
