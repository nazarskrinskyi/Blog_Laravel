<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where(self::TITLE, 'like', "%$value%");
    }

    public function content(Builder $builder, $value): void
    {
        $builder->where(self::CONTENT, 'like', "%$value%");
    }

    public function categoryId(Builder $builder, $value): void
    {
        $builder->where(self::CATEGORY_ID, $value);
    }


}
