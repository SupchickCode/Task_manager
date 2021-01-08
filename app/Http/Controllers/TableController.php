<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        Session::flash('message', 'Table has created !');

        return redirect()->back();
    }


    /**
     * Show table
     * 
     * @return view
     */
    public function view_table()
    {
        $table = Table::find(request('table_id'));

        return view('tmp.table_view', compact('table'));
    }


    /**
     * Delete table with all tasks belongs to this table
     * 
     * @return redirect
     */
    public function delete_table()
    {
        $table_id = request('table_id');

        DB::delete("DELETE FROM `tables` where id = $table_id");
        DB::delete("DELETE FROM `tasks` where table_id = $table_id");

        Session::flash('message', 'Table has deleted !');

        return redirect()->back();
    }
}
