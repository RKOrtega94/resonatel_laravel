<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function index(Role $role)
    {
        return view('maintenance.rol.index', ['roles' => $role->paginate()]);
    }

    public function edit(Role $role)
    {
        $page = DB::table('manus')
            ->where('status', 1)
            ->get();
        return view('roles.edit', compact('roles'), ['pages' => $page]);
    }
}
