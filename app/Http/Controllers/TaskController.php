<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Table;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Create a new task with empty string
     * 
     * @return redirect
     */
    public function create_task()
    {
        $table = Table::find(request('table_id'));

        $table->tasks()->create([
            'task_text' => '',
        ]);

        return redirect()->back();
    }


    /**
     * Add text to task 
     * 
     * @return redirect
     */
    public function add_text_task()
    {
        $task = Task::find(request('task_id'));

        $task->update([
            'task_text' => request('task_text'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove task 
     * 
     * @return redirect
     */
    public function remove_task()
    {
        $task_id = request('task_id');
        DB::delete("DELETE FROM `tasks` where id = $task_id");

        return redirect()->back();
    }

    
     /**
     * Udpate field `done` with value `1`
     * It means that task is done 
     * 
     * @return redirect
     */
    public function done_task()
    {
        $task = Task::find(request('task_id'));

        $task->update([
            'done' => 1,
        ]);

        return redirect()->back();
    }
}
