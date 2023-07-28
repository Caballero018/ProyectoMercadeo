<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserDisabled
{
    /**
     * Function that identifies if a user is disabled and acts accordingly.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->disabled) {
            return redirect()->route('admin.disabled');
        }
        return $next($request);
    }
}
