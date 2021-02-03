<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PermissionException extends Exception {
  protected $message = 'You do not have the required authorization.';

  public function __construct($permission = "", $message = null, $code = 0, Throwable $previous = null) {
    if ($permission) {
      $message = ($message ?? "You do not have the required authorization").": ".$permission;
    }
    parent::__construct(($message ?? $this->message), $code, $previous);
  }
}
