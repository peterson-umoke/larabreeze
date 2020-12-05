<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{

    /**
     * Show the confirm password view.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function show(Request $request)
    {
        return view('auth.admin.confirm-password');
    }

    /**
     * Confirm the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if (! Auth::guard('admin')->validate([
            'email' => $request->user('admin')->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }
}
