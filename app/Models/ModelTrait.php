<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Query\Expression;
use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property integer $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static Builder create(array $attributes)
 * @method static Builder find(mixed $id, array $columns = ['*'])
 * @method static Builder where(Closure|string|array|Expression $column, mixed $operatorOrValue = NULL, mixed $value = NULL, string $boolean = 'and')
 */
trait ModelTrait{
}