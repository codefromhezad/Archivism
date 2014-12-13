<?php

class ArchItemKind extends Eloquent {
	static public $kinds = array(
		'band' => "Band",
		'movie' => "Movie",
		'literature' => "Literature",
		'default' => "Default"
	);
}
