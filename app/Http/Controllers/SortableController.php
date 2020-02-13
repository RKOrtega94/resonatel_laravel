<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use Illuminate\Http\Request;

class SortableController extends Controller
{
    public function sortable($id, $sorting)
    {
        $getRol = User::find(auth()->user()->id)->profiles()->get();
        foreach ($getRol as $rol) {
            if ($rol->id == 1) {
                $menu = Menu::find($id);
                $menu->update([
                    'order' => $sorting
                ]);
            }
        }
    }
}
