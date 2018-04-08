<?php

namespace App\Http\Middleware;

use Closure;

class UserAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $auth = \Auth::guard('useradmin')->check();
      if($auth)
      {
        return $next($request);
      }
      return redirect("/administrator");

    }
}
