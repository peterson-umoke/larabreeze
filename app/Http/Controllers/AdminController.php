<?php


namespace App\Http\Controllers;


use App\Models\Admin;
use Inertia\Inertia;
use URL;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Index', [
            'admins' => Admin::all()->map(function (Admin $admin) {
                return [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'edit_url' => URL::route('admin.edit', $admin),
                ];
            }),
            'create_url' => URL::route('admin.create'),
        ]);
    }
}
