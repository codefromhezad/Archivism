<?php

class ArchProvider extends Eloquent {
	public static $providers = array(
		'DEFAULT' => 'default',
		'YOUTUBE' => 'youtube'
	);

	public $slug;

	public function __construct($url) {

		// Set default slug
		$this->slug = ArchProvider::$providers['DEFAULT'];

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			$this->slug = ArchProvider::$providers['YOUTUBE'];
		}

		return $this;
	}

	static public function check($url) {
		return new ArchProvider($url);
	}
}
