<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Query\Expression;
use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int author_id
 */
trait Authorable{
  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}