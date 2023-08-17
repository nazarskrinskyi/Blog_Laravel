<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static firstOrCreate(array $array)
 * @method static filter(mixed $filter)
 */
class PostTag extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'post_tags';
    protected $guarded = false;
}
