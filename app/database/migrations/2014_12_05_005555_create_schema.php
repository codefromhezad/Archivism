<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchema extends Migration {

	public function up()
	{
		Schema::create('items', function($table)
	    {
			$table->increments('id');
	        $table->string('name');
	        $table->string('href');
	        $table->string('kind');
	        $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('items');
	}

}
