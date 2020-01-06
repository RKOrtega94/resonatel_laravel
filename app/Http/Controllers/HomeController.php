<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Mail\TestEmail;
use App\Mail\WellcomeMail;
use App\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        return view('dashboard');
    }
}
