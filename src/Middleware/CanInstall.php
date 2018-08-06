<?php

namespace aBillander\Installer\Middleware;

use Closure;
use aBillander\Installer\Helpers\Installer;

class CanInstall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        if(Installer::alreadyInstalled()) {
            abort(404);
        }
        return $next($request);
    }

}
