<?php

class ArchProvider extends Eloquent {
	public static $providers = array(
		'default' => 'default',
		'youtube' => 'youtube'
	);

	public $slug;

	public function __construct($url) {

		// Set default slug
		$this->slug = ArchProvider::$providers['default'];

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			$this->slug = ArchProvider::$providers['youtube'];
		}

		return $this;
	}

	static public function makeFromUrl($url) {
		return new ArchProvider($url);
	}
}
