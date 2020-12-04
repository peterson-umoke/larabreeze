<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Auth\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(AdminLoginRequest $request)
    {
        dd($request);
        $request->user('admin')->authenticate();
        $request->user('admin')->session()->regenerate();

        return redirect(RouteServiceProvider::HOME_ADMIN);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->user('admin')->session()->invalidate();

        $request->user('admin')->session()->regenerateToken();

        return redirect('/');
    }
}
