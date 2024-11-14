<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StaffRegisterRequest;
use App\Models\User;
use App\Models\Role;

class StaffManagementController extends Controller
{
    public function index()
    {
        $staffs = User::whereHas('roles', function (Builder $query) {
            $query->where('role_name', 'manager');
        })->get();
        return view('admin.managers', compact('staffs'));
    }

    public function create()
    {
        return view('admin.managers_registration');
    }

    public function store(StaffRegisterRequest $request)
    {
        $roleId = Role::find(10);
        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        $newUser->roles()->attach($roleId);

        $staffs = Role::find(10)->managers();
        return view('admin.managers', compact('staffs'));
    }
}
