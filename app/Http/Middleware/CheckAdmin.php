<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Contracts\Auth\Guard;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() || $this->auth->user()->status != 'admin') {
            if ($this->auth->guest()) {
                return redirect()->guest('login');
            } else {
                return Abort(401);
            }
        }
        return $next($request);
    }
}
