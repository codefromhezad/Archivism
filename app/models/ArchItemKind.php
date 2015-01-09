<?php

class ArchItemKind extends Eloquent {
	public static $kinds = array(
		'band'		=> "Band",
		'movie'		=> "Movie",
		'tvshow'	=> 'TV Show',
		'literature'=> "Literature",
		'default'	=> "Default"
	);

	public static $defaultProviderKind = array(
		'default' => 'default',
		'youtube' => 'movie'
	);

	public static function getDefaultKindFromProvider($provider) {
		if( $provider && isset( self::$defaultProviderKind[$provider] ) ) {
			return self::$defaultProviderKind[$provider];
		} else {
			return null;
		}
	}
}
