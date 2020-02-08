<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('order', 'asc')->orderBy('parent', 'asc')->get();
        return view('menus.index', ['navigations' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navs = Menu::getNavs();
        return view('menus.create', compact('navs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Menu();
        if ($request->menu_item == 'on') {
            $menu = $model->create($request->merge([
                'menu_item' => 1
            ])->all());
        } else {
            $menu = $model->create($request->merge([
                'menu_item' => 0
            ])->all());
        }
        return redirect()->route('menu.index')->withStatus(__("Route $menu->name successfully created."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return $menu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::findOrFail($menu->id);
        return view('menus.edit', ['menuItem' => $menu, 'navs' => Menu::getNavs()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, Request $request)
    {
        if ($request->menu_item == 'on') {
            $menu->update($request->merge([
                'menu_item' => 1
            ])->all());
        } else {
            $menu->update($request->merge([
                'menu_item' => 0
            ])->all());
        }
        return redirect()->route('menu.index')->withStatus(__("Page $menu->name successfully updated."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->withStatus(__("Route $menu->name successfully deleted."));
    }
}
