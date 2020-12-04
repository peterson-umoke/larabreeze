<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @return string|null
     */
    protected function redirectTo($request, array $guards)
    {
        if (!$request->expectsJson()) {
            switch (current($guards)):
                case 'admin':
                    return route('admin.login');
                default:
                    return route('login');
            endswitch;
        }
    }
}
