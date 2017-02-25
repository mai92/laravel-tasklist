<?php

namespace App\Http\Controllers;

use App\Position;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
	/**
	 * @param  Request $request
	 * @return redirect
	 */
	public function create(Request $request)
	{
		$request->user()->createTask($request);

		return redirect()->back();
	}

    public function position(Position $position)
    {
        $users = $position->user()->paginate(15);
        $users->load('todayTasks', 'position');

        return view('tasks.index', [
            'users' => $users,
            'position' => $position,
        ]);
    }
}
