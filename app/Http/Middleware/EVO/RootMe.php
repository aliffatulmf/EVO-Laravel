<?php

namespace App\Http\Middleware\EVO;

use Closure;
use Illuminate\Http\Request;

class RootMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->user());
        if (auth()->user()->role->is_admin == 1) {
            return redirect()->route('admin.index');
        }else {
            return redirect()->route('client.index');
        }

        return $next($request);
    }
}
