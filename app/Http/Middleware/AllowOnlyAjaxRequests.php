<?php

namespace App\Http\Middleware;

use Closure;

class AllowOnlyAjaxRequests
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
        if(!$request->ajax()) {
            $code = 403;
            // Handle the non-ajax request
            return response()->json([
                'code' => $code, 
                'message' => 'Request Not Allowed.'
            ], $code);
        }
        return $next($request);
    }
}
