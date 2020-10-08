<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use DateTime;

/**
 * @method static create(array $all)
 * @method static find($id)
 * @property int id
 * @property string name
 * @property string phone
 * @property string email
 * @property bool gender
 * @property mixed birthday
 * @property User author
 * @property int author_id
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Customer extends Model{
  use Commentable;

  protected $fillable = [
    'name', 'surname', 'email', 'gender', 'birthday', 'phone'
  ];
  protected $casts = [
    "birthday" => "date",
    "gender" => "boolean",
    "id" => "string",
    "author_id" => "string",
  ];

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }

  public function card(){
    return $this->hasOne(CustomerCard::class, "owner_id");
  }
}
