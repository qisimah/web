<?php

namespace App\Http\Middleware;

use Closure;

class WhitelistInMaintenanceMode
{
	protected $except = [
		'detection'
	];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if ($this->app->isDownForMaintenance() && !$this->shouldPassThrough($request)){
    		throw  new \Symfony\Component\HttpKernel\Exception\HttpException(503);
		}
        return $next($request);
    }
}
