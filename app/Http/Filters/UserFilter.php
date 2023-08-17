<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::EMAIL => [$this, 'email'],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where(self::NAME, 'like', "%$value%");
    }

    public function email(Builder $builder, $value): void
    {
        $builder->where(self::EMAIL, 'like', "%$value%");
    }

}
