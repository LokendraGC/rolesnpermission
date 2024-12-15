<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $userRecord = User::getRecord();
        $roles = User::getRole();

        return view('backend.users.index', [
            'userRecord' => $userRecord,
            'roles' => $roles
        ]);
    }

    public function addUser()
    {
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
        User::destroy($id);
        return redirect()->route('show.users')->with('success', 'Deleted Successfully');
    }
}
