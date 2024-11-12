<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StaffRegisterRequest;
use App\Models\User;
use App\Models\Role;

class StaffManagementController extends Controller
{
    public function index()
    {
        $staffs = Role::find(10)->managers();
        return view('admin.managers', compact('staffs'));
    }

    public function create()
    {
        return view('admin.managers_registration');
    }

    public function store(StaffRegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $staffs = Role::find(10)->managers();
        return view('admin.managers', compact('staffs'));
    }
}
