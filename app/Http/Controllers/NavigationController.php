<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index(Menu $model)
    {
        return view('maintenance.navigation.index');
    }
}
