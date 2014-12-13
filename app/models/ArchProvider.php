<?php

define('PROVIDER_YOUTUBE', 'youtube');

class ArchProvider extends Eloquent {
	protected $slug;

	protected function analyze($url) {

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			var_dump($matches);
			die;
		}
	}

	public function __construct($url) {
		$this->analyze($url);
	}

	static public function check($url) {
		return new ArchProvider($url);
	}
}
