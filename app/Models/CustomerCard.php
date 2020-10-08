<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;

/**
 * @method static create(array $all)
 * @method static find($id)
 * @property integer id
 * @property integer number
 * @property integer balance
 * @property Customer owner
 * @property int owner_id
 * @property User author
 * @property int author_id
 */
class CustomerCard extends Model{
  use Commentable;

  protected $fillable = [
    'number', 'owner_id'
  ];
  protected $casts = [
    "balance" => "integer",
    "number" => "string",
  ];

  public function owner(){
    return $this->belongsTo(Customer::class, "owner_id");
  }

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}