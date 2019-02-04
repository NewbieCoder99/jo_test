<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'name','guard_name'
	];

	public function usersHasRole()
	{
		return $this->belongsToMany(
			User::class,'model_has_roles', 'role_id', 'model_id'
		);
	}
}
