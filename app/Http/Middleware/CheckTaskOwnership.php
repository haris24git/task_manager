<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTaskOwnership
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
        $task = $request->route('task');
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // Only owner can access
        }
        return $next($request);
    }
}
