<?php

namespace App\Http\Controllers;

use App\Charts\test;
use App\Profile;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $indicators = [];
        switch (auth()->user()->group) {
            case 'NA':
                $indicators['BAF'] = ['TMO', 'ADHERENCIA', 'CONVERTIBILIDAD'];
                $indicators['CHAT'] = ['TMO', 'ADHERENCIA', 'CONVERTIBILIDAD'];
                $indicators['PW'] = ['TMO', 'ADHERENCIA', 'CONVERTIBILIDAD'];
                break;
        }
        return view('dashboard', [
            'profiles' => Profile::with('users')->get(),
            'keys' => array_keys($indicators),
            'indicators' => $indicators
        ]);
    }
}
