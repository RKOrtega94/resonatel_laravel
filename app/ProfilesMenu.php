<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilesMenu extends Model
{
    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parent']) {
                $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getChildren($data, $line1)])]);
            }
        }
        return $children;
    }

    public function getMenuAll()
    {
        return $this
            ->join('menus', 'menus.id', 'profiles_menus.menu_id')
            ->join('profiles', 'profiles.id', 'profiles_menus.profile_id')
            ->join('users_profiles', 'profiles.id', 'users_profiles.profile_id')
            ->join('users', 'users_profiles.user_id', 'users.id')
            ->where('menus.enabled', 1)
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name')
            ->select('menus.*', 'users.id as user_id')
            ->get()
            ->toArray();
    }

    public static function menus()
    {
        $menus = new ProfilesMenu();
        $data = $menus->getMenuAll();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [array_merge($line, ['submenu' => $menus->getChildren($data, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
}
