<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;

class Customer extends Model{
  use Commentable;

  protected $casts = [
    "birthday" => "date"
  ];

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}
