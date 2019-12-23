<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuByRol extends Model
{
    // Método getChildren()
    // Recorre el array $data para extraer los “hijos” (el valor del campo parent debe coincidir con el id de la opción superior).
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

    // Método optionsMenu()
    // Retorna un array con las opciones del menú activas (enabled = 1) y ordenadas por parent, order y name.
    public function optionMenu()
    {
        return $this->where('enabled', 1)
            ->join('menus', 'menus.id', 'menu_by_rols.menu_id')
            ->join('roles', 'roles.id', 'menu_by_rols.role_id')
            ->select('menus.*', 'roles.id as role')
            ->orderby('parent')
            ->orderby('order')
            ->orderby('name')
            ->get()
            ->toArray();
    }

    // Método menus()
    // El objetivo del método menus() es recorrer todas las opciones del menú y en aquellas opciones “padre” obtener sus “hijos” u opciones que dependerán de la opción principal, y éste grupo de ítems quedarán registrados en un array llamado submenú.
    public static function menus()
    {
        $menus = new MenuByRol();
        $data = $menus->optionMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [array_merge($line, ['submenu' => $menus->getChildren($data, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
}
