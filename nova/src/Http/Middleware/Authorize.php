<?php

namespace Laravel\Nova\Http\Middleware;

use Laravel\Nova\Nova;

class Authorize {
  public function handle($request, $next) {
    if (!\Auth::user()->isAdmin()) return redirect('/');
    return Nova::check($request) ? $next($request) : abort(403);
  }
}
