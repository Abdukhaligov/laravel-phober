<?php

namespace App;

use App\Models\Log;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Auth;

trait Loggable{
  /**
   * @return MorphMany
   */
  public function logs(){
    return $this->morphMany(Log::class, 'loggable');
  }

  public function updateLog(string $method, $request, array $old){
    if($user = Auth::user()){
      $data["action"] = $method;
      $data["ip"] = $request->ip();
      $data["url"] = $request->url();
      $data["author_id"] = $user->id;

      $data["body"] = json_encode([
        "new" => $request->all(),
        "old" => $old,
      ]);

      $this->logs()->create($data);
    }
  }
}