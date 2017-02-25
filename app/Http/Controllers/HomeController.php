<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Position $position)
    {
        $users = $user->paginate(15);
        $users->load('todayTasks', 'position');

        return view('tasks.index', [
            'users' => $users,
            'position' => $position,
        ]);
    }
}
