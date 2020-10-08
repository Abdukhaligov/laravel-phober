<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;

/**
 * @method static create(array $all)
 * @method static find($id)
 * @property int author_id
 */
class Customer extends Model{
  use Commentable;

  protected $fillable = [
    'name', 'surname', 'email', 'gender', 'birthday', 'phone'
  ];
  protected $casts = [
    "birthday" => "date",
    "gender" => "boolean",
    "author_id" => "integer",
  ];

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}
