<?php

namespace App\Http\Middleware\EVO;

use Closure;
use Illuminate\Http\Request;

class MultiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$level)
    {
        if (in_array(auth()->user()->role->is_admin, $level)) {
            return $next($request);
        }
        return redirect('/');
    }
}
