<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if user is super admin get all tasks else get tasks of the users
        $tasks = collect();

        $users = collect();

        if (auth()->user()->hasRole('superadmin|admin')) {
            $tasks = Task::with('user')->get();
            $users = User::all();
            $data = [
                'tasks' => $tasks,
                'users' => $users
            ];
            return response()
                ->view('superadmin.tasks_list', $data, 200);
            // return view('superadmin.tasks_list')->with('tasks', 'users');
        } else {
            $tasks = auth()->user()->tasks()->with('user')->get();
            $users = User::all();
            $data = [
                'tasks' => $tasks,
                'users' => $users
            ];
            return response()
                ->view('superadmin.tasks_list', $data, 200);
            // return view('superadmin.tasks_list')->with('tasks', 'users');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        $validated = $request->validated();
        $task = new Task();
        $task->name = $request->name;
        $task->status = $request->status;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
        $task->save();
        return response()->json([
            'success' => 'Information added with success',
            'task' => $task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'success' => 'Task deleted with success',
        ]);
    }
    public function getTasks()
    {
        if (auth()->user()->hasRole('superadmin|admin')) {
            $tasks = Task::with('user')->get();
            return response()->json([
                'tasks' => $tasks
            ]);
            // return view('superadmin.tasks_list')->with('tasks', 'users');
        } else {
            $tasks = auth()->user()->tasks()->get();
            return response()->json([
                'tasks' => $tasks
            ]);
        }
    }
}
