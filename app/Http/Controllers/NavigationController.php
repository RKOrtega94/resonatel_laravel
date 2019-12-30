<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class NavigationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'profile']);
    }

    public function index(Menu $model)
    {
        return view('maintenance.navigation.index', ['navs' => $model->paginate()]);
    }
}
