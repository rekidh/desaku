<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if ($request->header('X-CSRF-TOKEN') == session()->token()) {
        //     return route('api_warga');
        // } else {
        //     dd('tidak m]sama');
        // }

        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
