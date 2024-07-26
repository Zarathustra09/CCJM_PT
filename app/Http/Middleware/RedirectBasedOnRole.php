<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role == 1) {
                $agent = $user->agent;

                if ($agent) {

                    if (!$agent->documents()->exists()) {
                        return redirect()->route('register-agent');
                    } else {
                        return redirect()->route('agent.dashboard');
                    }
                } else {
                    return redirect()->route('register-agent');
                }
            } elseif ($user->role == 0) {
                return redirect()->route('client.dashboard');
            } elseif ($user->role == 2) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }

}
