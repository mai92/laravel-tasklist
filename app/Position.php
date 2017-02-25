<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * @package App
 */
class Position extends Model
{
    /**
     * [$guarded protected field from mass assignment]
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * [getRouteKeyName declare route name]
     * @return string
     */
	public function getRouteKeyName()
	{
		return 'slug';
	}

    /**
     * [Realtion to User Model]
     * @return Relation
     */
	public function user()
	{
		return $this->hasOne(User::class);
	}
}
