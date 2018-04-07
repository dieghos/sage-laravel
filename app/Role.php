<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;

class Role extends Model
{
    public function permissions()
    {
      return $this->belongsToMany(Permission::class);
    }

    public givePermissionTo(Permission $permission)
    {
      return $this->permissions()->save($permission);
    }
}
