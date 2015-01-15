<?php

use Carbon\Carbon;

class ArchItem extends Eloquent {
	protected $table = 'items';

	/* Scope to get default number of items in a listing */
	public function scopeListing($query, $count = null)
    {	
    	if( ! is_int($count) ) {
    		$count = Config::get('archivism.default_listing_limit');
    	}
        return $query->take($count);
    }

	/* Nice looking dates for created/updated attributes */
	public function getUpdatedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->diffForHumans();
	}
}
