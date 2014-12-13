<?php

define('PROVIDER_DEFAULT', 'default');
define('PROVIDER_YOUTUBE', 'youtube');

class ArchProvider extends Eloquent {
	public $slug = PROVIDER_DEFAULT;

	public function __construct($url) {

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			$this->slug = PROVIDER_YOUTUBE;
		}

		return $this;
	}

	static public function check($url) {
		return new ArchProvider($url);
	}
}
