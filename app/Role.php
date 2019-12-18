<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function getRole()
    {
        return $this->where('status', 'A')
            ->get()
            ->toArray();
    }

    public static function roles()
    {
        $role = new Role();
        $data = $role->getRole();
        $roleAll = [];
        foreach ($data as $item) {
            $roleAll = array_merge($item);
        }
        return $role->roleAll = $roleAll;
    }
}
