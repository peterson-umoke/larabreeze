<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @param mixed ...$guards
     * @return string|null
     */
    protected function redirectTo($request, ...$guards)
    {
        if (!$request->expectsJson()) {
            $i = current($guards);
            if ($i == 'admin') {
                return route('admin.login');
            } elseif ($i == 'web') {
                return route('login');
            }
        }
    }
}
