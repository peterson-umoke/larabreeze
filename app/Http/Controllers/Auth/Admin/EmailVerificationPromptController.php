<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user('admin')->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::ADMIN_HOME)
                    : view('auth.admin.verify-email');
    }
}
