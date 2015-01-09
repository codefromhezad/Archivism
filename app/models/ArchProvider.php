<?php

class ArchProvider extends Eloquent {
	public static $providers = array(
		'default' => 'Default',
		'youtube' => 'Youtube'
	);

	public $slug;
	public $name;

	public function __construct($url) {

		// Set default slug
		$this->setDataFromSlug('default');

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			$this->setDataFromSlug('youtube');
		}

		return $this;
	}

	public function setDataFromSlug($slug) {
		if( isset( self::$providers[$slug] ) ) {
			$this->slug = $slug;
		} else {
			$this->slug = 'default';
		}
		$this->name = self::$providers[$this->slug];
	}

	static public function makeFromUrl($url) {
		return new ArchProvider($url);
	}
}
