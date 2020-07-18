<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaComments\Commentable;
use DateTime;

class Instance extends Model {
  use Commentable;

  protected $casts = [
      'deactivation_period_start' => 'datetime',
      'deactivation_period_end' => 'datetime',
  ];

  protected $hidden = ['created_at', 'updated_at', 'device_id'];

  public function device() {
    return $this->belongsTo(Device::class);
  }

  public function toArray() {
    $data = parent::toArray();
    $data["device"] = $this->device;
    $data["status"] = $this->status();
    $data["comments"] = [];
    foreach ($this->comments as $comment){
      $data["comments"][] = array(
          "comment" => $comment->comment,
          "author" => $comment->commenter->username,
          "author_email" => $comment->commenter->email,
          "date" => date('h:m:s d-m-Y', strtotime($comment->created_at))
      );
    }

    return $data;
  }

  public function status() {
    $now = new DateTime();
    $now = $now->format('Y-m-d h:m:s');

    if (!$this->active) {
      if (!$this->deactivation_start && !$this->deactivation_end) {
        return false;
      } elseif ($this->deactivation_start && $this->deactivation_end) {
        if ($now > $this->deactivation_start && $now < $this->deactivation_end) {
          return false;
        }
      } elseif (!$this->deactivation_start && $this->deactivation_end) {
        if ($now < $this->deactivation_end) {
          return false;
        }
      } elseif ($this->deactivation_start && !$this->deactivation_end) {
        if ($now > $this->deactivation_start) {
          return false;
        }
      } else {
        return true;
      }
    }

    return true;
  }
}
