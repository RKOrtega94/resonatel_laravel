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
        $tmo = new test;
        $tmo->title('TMO', 16, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif")
            ->displayAxes(false);
        $tmo->labels(['Cumplimiento', 'Faltante']);
        $tmo->dataset('TMO', 'pie', [80, 20])
            ->backgroundColor(['#43a047', '#e53935']);
        $test1 = new test;
        $test1->title('TMO', 16, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif")
            ->displayAxes(false);
        $test1->labels(['Cumplimiento', 'Faltante']);
        $test1->dataset('TMO', 'pie', [80, 20])
            ->backgroundColor(['#43a047', '#e53935']);
        $test2 = new test;
        $test2->title('TMO', 16, '#666', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif")
            ->displayAxes(false);
        $test2->labels(['Cumplimiento', 'Faltante']);
        $test2->dataset('TMO', 'pie', [80, 20])
            ->backgroundColor(['#43a047', '#e53935']);
        return view('dashboard', [
            'profiles' => Profile::with('users')->get(),
            'tmo' => $tmo,
            'test1' => $test1,
            'test2' => $test2
        ]);
    }
}
