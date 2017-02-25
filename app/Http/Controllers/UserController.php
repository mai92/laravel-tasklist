<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * [show show user specific with today task]
     * @param  User   $user [User Model Class]
     * @return [type]
     */
    public function show(User $user)
    {
    	return view('users.index', [
    		'tasks' => $user->tasks()->today()->latestFirst()->paginate(15),
    	]);
    }
}
