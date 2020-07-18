<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
  protected $casts = [
      "birthday" => "date"
  ];

  public function author() {
    return $this->belongsTo(User::class, "created_by");
  }
}
