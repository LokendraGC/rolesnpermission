<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleHasPermission;
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
        $request->validate([
            'role' => 'required'
        ]);

        $user = new Role;
        $user->role = $request->role;
        $user->save();

        RoleHasPermission::insertUpdateRecord($request->permission_id, $user->id);

        return redirect()->route('roles')->with('success', 'creates Successfully');
    }

    public function editRole($id)
    {
        $permission = Permission::getRecord();
        $getRecord = Role::getSingle($id);
        $permission_data = RoleHasPermission::getPermission($id);
        return view('backend.roles.edit-roles', ['getRecord' => $getRecord, 'permission' => $permission, 'permission_data' => $permission_data]);
    }


    public function updateRole(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'role' => 'required'
        ]);

        $user = Role::getSingle($id);
        $user->role = $request->role;

        $user->save();

        RoleHasPermission::insertUpdateRecord($request->permission_id, $user->id);

        return redirect()->route('roles')->with('success', 'Updated Successfully');
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        return redirect()->route('roles')->with('success', 'Deleted Successfully');
    }
}
