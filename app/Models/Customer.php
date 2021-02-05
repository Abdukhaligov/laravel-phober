<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string first_name
 * @property string last_name
 * @property string phone
 * @property string email
 * @property bool gender
 * @property DateTime birthday
 * @property User author
 * @property int author_id
 * @method destroyer()
 */
class Customer extends Model{
  use ModelTrait, HasFactory;

  protected $fillable = [
    'name', 'surname', 'email', 'gender', 'birthday', 'phone'
  ];
  protected $casts = [
    "birthday" => "date"
  ];

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }

  public function getAge(): int|bool{
    if (!$this->birthday) return false;

    $now = new DateTime();

    return ($now->diff(($this->birthday)))->y;
  }

  public function getNextBirthday(): int|bool{
    if (!$this->birthday) return false;

    try{
      $now = new DateTime();
      $temp = new DateTime(date_format($this->birthday, 'Y-m-d'));
      $temp->setDate($now->format('Y'), $temp->format('m'), $temp->format('d'));
      $diff = date_diff($now, $temp);

      return !$diff->invert ? $diff->days + 1 : $diff->days * -1;
    } catch (\Exception $e){
      return false;
    }
  }
}
