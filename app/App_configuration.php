<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class App_configuration extends Model implements Auditable
{

	use \OwenIt\Auditing\Auditable;

	protected $fillable = [
		'language_id',
		'name',
		'meta_description',
		'meta_author',
		'meta_html',
		'about',
		'contact',
		'our_team',
		'services',
		'favicon',
		'logo'
	];

	protected $auditExclude = ['published'];

	protected $auditInclude = [
		'language_id',
		'name',
		'meta_description',
		'meta_author',
		'meta_html',
		'about',
		'contact',
		'our_team',
		'services',
		'favicon',
		'logo'
	];

	public function lang()
	{
		return $this->belongsTo(Language::class,'language_id');
	}
}
