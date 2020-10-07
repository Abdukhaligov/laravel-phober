<?php

namespace App\Http\Controllers;

use App\Models\Log;

class SpaController extends Controller {
  public function index() {
    $logs = [
        "action" => __FUNCTION__,
        "ip" => \Request::ip(),
        "url" => \Request::url(),
        "body" => json_encode([
            "status" => "Success",
        ]),
    ];

    Log::create($logs);

    return view('spa');
  }
}