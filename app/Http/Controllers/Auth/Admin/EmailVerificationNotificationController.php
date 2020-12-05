<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        if ($request->user('admin')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        }

        $request->user('admin')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
