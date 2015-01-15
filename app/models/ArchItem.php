<?php

use Carbon\Carbon;

class ArchItem extends Eloquent {
	protected $table = 'items';

	public function getUpdatedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
	}
}
