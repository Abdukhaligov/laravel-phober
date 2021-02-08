<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthorableObserver{
  public function creating(Model $model){
    $model->author_id = Auth::id();
  }
}
