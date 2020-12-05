<?php


namespace App\Http\Controllers;


use App\Models\Admin;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function show(Admin $event)
    {
        return Inertia::render('Admin/Show', [
            'admin' => $event->only(
                'id',
                'name',
                'email',
            ),
        ]);
    }
}
