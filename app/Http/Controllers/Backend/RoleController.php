<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class RoleController extends Controller
{
    public function list()
    {
        $data['roleRecord'] = Role::getRecord();
        return view('backend.roles.index', $data);
    }

    public function addRole()
    {
        $permission = Permission::getRecord();
        return view('backend.roles.add-roles', ['permission' => $permission]);
    }
    public function insert(Request $request)
    {
        $user = new Role;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('roles')->with('success', 'creates Successfully');
    }

    public function editRole($id)
    {
        $data['getRecord'] = Role::getSingle($id);
        return view('backend.roles.edit-roles', $data);
    }

    public function updateRole(Request $request, $id)
    {
        $user = Role::getSingle($id);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('roles')->with('success', 'Updated Successfully');
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        return redirect()->route('roles')->with('success', 'Deleted Successfully');
    }
}
