<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where(self::TITLE, 'like', "%$value%");
    }

    public function description(Builder $builder, $value): void
    {
        $builder->where(self::DESCRIPTION, 'like', "%$value%");
    }

}
