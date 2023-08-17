<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostTagFilter extends AbstractFilter
{
    public const TAG_ID = 'tag_id';
    protected function getCallbacks(): array
    {
        return [
            self::TAG_ID => [$this, 'tag_id'],
        ];
    }

    public function tags(Builder $builder, $value): void
    {
        $builder->where(self::TAG_ID, $value);
    }
}
