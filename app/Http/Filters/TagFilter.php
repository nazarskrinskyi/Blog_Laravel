<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TagFilter extends AbstractFilter
{
    public const TITLE = 'title';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where(self::TITLE, 'like', "%$value%");
    }

}
