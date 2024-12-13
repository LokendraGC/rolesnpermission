<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    static public function getRecord()
    {
        return Role::get();
    }
    static public function getSingle($id)
    {
        return Role::find($id);
    }
}
