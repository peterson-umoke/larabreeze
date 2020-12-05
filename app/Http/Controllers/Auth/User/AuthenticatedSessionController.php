<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function create()
    {
        return view('auth.user.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param UserLoginRequest $request
     * @return RedirectResponse
     */
    public function store(UserLoginRequest $request)
    {
        $request->authenticate();

//        $request->session()->regenerate();

//        return redirect(RouteServiceProvider::USER_HOME);
        return redirect()->intended(RouteServiceProvider::USER_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

//        $request->session()->invalidate();

//        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
