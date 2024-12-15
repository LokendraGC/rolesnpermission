<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;

    protected $table = 'role_has_permissions';

    static public function insertUpdateRecord(array $permission_ids, int $role_id)
    {
        RoleHasPermission::where('role_id', '=', $role_id)->delete();

        foreach ($permission_ids as $permission_id) {
            $permission = new RoleHasPermission();
            $permission->permission_id = $permission_id;
            $permission->role_id = $role_id;
            $permission->save();
        }
    }

    static public function getPermission($role_id)
    {
        return RoleHasPermission::where('role_id', '=', $role_id)->get();
    }

    static function getPermissions($slug, $role_id)
    {
        return RoleHasPermission::select('role_has_permissions.id')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_id', '=', $role_id)
            ->where('slug', '=', $slug)
            ->count();
    }
}
