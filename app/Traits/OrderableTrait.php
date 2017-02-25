<?php

namespace App\Traits;

trait OrderableTrait
{
    /**
     * @param  $query
     * @return $query
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
