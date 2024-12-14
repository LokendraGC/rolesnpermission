<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    static public function getRecord()
    {
        $getPermission = Permission::groupBy('groupby')->get();

        $result = [];
        foreach ($getPermission as $value) {
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);

            // Construct a group item
            $group = [];
            foreach ($getPermissionGroup as $val) {
                $group[] = [
                    'id' => $val->id,
                    'name' => $val->name,
                ];
            }

            // Add the group data to the result
            $result[] = [
                'groupby' => $value->name,
                'permissions' => $group, // Contains all items in the group
            ];
        }

        return $result;
    }

    static function getPermissionGroup($groupby)
    {
        return Permission::where('groupby', '=', $groupby)->get();
    }
}
