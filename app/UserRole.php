<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	protected $table = "role_user";

	protected $fillable = ['role_name','created_at','updated_at'];

	public function getUserObject()
	{
		return $this->belongsToMany(User::class)->using(UserRole::class);
	}
}
