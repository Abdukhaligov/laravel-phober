<?php

namespace App\Http\Controllers;

use App\Models\Logs;

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

    Logs::create($logs);

    return view('spa');
  }
}