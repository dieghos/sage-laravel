<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
      $roles = $request->user()->roles()->get();
      foreach ($roles as $role) {
        if($role->hasPermissions($permission)){
          return $next($request);
        };
      }

      return redirect('home');

    }
}
