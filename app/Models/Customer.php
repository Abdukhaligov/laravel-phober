<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string phone
 * @property string email
 * @property bool gender
 * @property DateTime birthday
 * @property User author
 * @property int author_id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static create(array $attributes)
 * @method static find($id)
 * @method destroyer()
 */
class Customer extends Model{
  use HasFactory;

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
}
