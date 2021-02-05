<?php

namespace App\Models\Cards;

use App\Models\Customer;
use App\Models\ModelTrait;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;

/**
 * @property integer number
 * @property Collection owner
 * @property array comments
 */
class LoyaltyCard extends Model{
  use ModelTrait, HasFactory, Commentable;

  protected $fillable = ['number', 'owner_id'];
  protected $with = ["owner"];
  protected $casts = [
    "number" => "string",
  ];

  public function owner(){
    return $this->belongsTo(Customer::class, "owner_id");
  }

  public function author(){
    return $this->belongsTo(User::class, "author_id");
  }
}
