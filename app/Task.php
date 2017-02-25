<?php

namespace App;

use App\Traits\OrderableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Task
 * @package App
 */
class Task extends Model
{
    use OrderableTrait;

    protected $fillable = [
    	'task',
    	'due_date',
    ];

    /**
     * [declare dates property]
     * @var [type]
     */
    protected $dates = [
    	'due_date',
    ];

    /**
     * [scopeToday get today task]
     * @param  [type] $query
     * @return [type]
     */
    public function scopeToday($query)
    {
    	return $query->where(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'),
            Carbon::now()->format('Y-m-d')
        );
    }
}
