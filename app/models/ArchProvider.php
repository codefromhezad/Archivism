<?php

class ArchProvider extends Eloquent {
	public static $providers = array(
		'default' => 'Default',
		'youtube' => 'Youtube'
	);

	public $slug;
	public $name;
	public $url = null;
	public $unique_id = null;

	public function __construct($url = null) {
		$this->setAs('default');
		$this->setFromUrl($url);
	}

	public function setAs($slug) {
		if( isset( self::$providers[$slug] ) ) {
			$this->slug = $slug;
		} else {
			$this->slug = 'default';
		}
		$this->name = self::$providers[$this->slug];
	}

	public function setFromUrl($url = null) {
		$this->url = $url;

		// Check if YouTube
		if( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches) ) {
			$this->setAs('youtube');
			$this->unique_id = $matches[0];
		} 
	}
}
