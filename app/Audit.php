<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type',
        'user_id',
        'event',
        'auditable_type',
        'auditable_id',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'tags',
        'user_agent',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
