<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
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
     * Create a new table for auth user
     * 
     * @return  redirect
     */
    public function create_table()
    {
        auth()->user()->tables()->create([
            'table_title' => ucfirst(request('title')),
        ]);

        return redirect()->back();
    }


    public function view_table()
    {   
        $tabel_id = request('tabel_id');
        $table = Table::find($tabel_id);

        return view('tmp.table_view', compact('table'));
    }
}
