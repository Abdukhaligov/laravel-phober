<?php

namespace App\Exceptions;

use App\Models\Logs;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler {
  protected $dontReport = [
    //
  ];

  protected $dontFlash = [
      'password',
      'password_confirmation',
  ];

  public function report(Throwable $exception) {
    parent::report($exception);
  }

  public function render($request, Throwable $exception) {
    $logs = [
        "action" => __FUNCTION__,
        "ip" => \Request::ip(),
        "url" => \Request::url(),
        "body" => json_encode([
            "status" => "Error",
            "Exception" => get_class($exception)
        ]),
    ];

    Logs::create($logs);

    return parent::render($request, $exception);
  }
}
