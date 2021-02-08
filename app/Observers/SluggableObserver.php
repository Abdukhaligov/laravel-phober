<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SluggableObserver{
  public function creating(Model $model){
    $model->slug = Str::slug($model->name);
  }
}
