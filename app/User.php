<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'position_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [getRouteKeyName declare route name]
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * [position relation to Position Model]
     * @return Relation
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * [tasks relation to Task Model]
     * @return Relation
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * [todayTasks relation to Task Model with today scope order with latestFirst]
     * @return Relation
     */
    public function todayTasks()
    {
        return $this->hasMany(Task::class)->today()->latestFirst();
    }

    /**
     * [createTask create a task function]
     * @param  Request $request
     * @return [type]
     */
    public function createTask(Request $request)
    {
        $this->tasks()->create($request->all());
    }
}
