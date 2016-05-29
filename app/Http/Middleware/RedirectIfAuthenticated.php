<?php

namespace Tutorbuddy\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    protected $auth;


    public function __construct(Guard $auth){
        $this->auth = $auth;

    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
