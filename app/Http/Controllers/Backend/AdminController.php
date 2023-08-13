<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $roles = Roles::get();
        $admins = User::get();
        return view('backend.pages.admin.index', compact('admins', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        User::create($request->all());
        return redirect()->back()->with('message', 'Admin created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'phone' => 'required|unique:users,phone,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'role_id' => 'required',
        ]);
        $admin = User::find($id);
        $admin->update($request->all());
        return redirect()->back()->with('message', 'Admin updated successfully');
    }

    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->back()->with('message', 'Admin deleted successfully');
    }
}