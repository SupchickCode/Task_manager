<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Show home page with all table for auth user
     * @return view
     */
    public function index()
    {
        $var_for_render = [
            'user' => auth()->user(),
            'tables' => auth()->user()->tables()->latest()->get()
        ];
        
        return view('home', compact('var_for_render'));
    }
}
