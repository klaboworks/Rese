<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class StaffManagementController extends Controller
{
    public function index()
    {
        $staffs = Role::find(10)->managers();
        return view('admin.managers', compact('staffs'));
    }
}
