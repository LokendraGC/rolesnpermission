<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoleHasPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $permissionRole = RoleHasPermission::getPermissions('users', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        $PermissionAdd = RoleHasPermission::getPermissions('add-user', Auth::user()->role_id);
        $PermissionEdit = RoleHasPermission::getPermissions('edit-user', Auth::user()->role_id);
        $PermissionDelete = RoleHasPermission::getPermissions('delete-user', Auth::user()->role_id);

        $userRecord = User::getRecord();
        $roles = User::getRole();

        return view('backend.users.index', [
            'userRecord' => $userRecord,
            'roles' => $roles,
            'PermissionAdd' => $PermissionAdd,
            'PermissionEdit' => $PermissionEdit,
            'PermissionDelete' => $PermissionDelete
        ]);
    }

    public function addUser()
    {
        $permissionRole = RoleHasPermission::getPermissions('add-user', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        return view('backend.users.add-user', [
            'roles' => User::getRole()
        ]);
    }
    public function insert(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'role_id' => 'required|exists:roles,id', // Validate role_id
        // ]);

        $permissionRole = RoleHasPermission::getPermissions('add-user', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;

        $user->save();

        return redirect()->route('show.users')->with('success', 'User created successfully!');
    }


    public function editUser($id)
    {
        $permissionRole = RoleHasPermission::getPermissions('edit-user', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        return view('backend.users.edit-user', [
            'getRecord' => User::getSingle($id),
            'roles' => User::getRole()
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;

        $user->save();

        return redirect()->route('show.users')->with('success', 'Updated Successfully');
    }

    public function deleteUser($id)
    {
        $permissionRole = RoleHasPermission::getPermissions('delete-user', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        User::destroy($id);
        return redirect()->route('show.users')->with('success', 'Deleted Successfully');
    }
}
