<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProviderToItems extends Migration {

	public function up()
	{
		Schema::table('items', function($table)
	    {
	        $table->string('provider')->default('default');
		});
	}

	public function down()
	{
		Schema::table('items', function($table)
		{
		    $table->dropColumn('provider');
		});
	}

}
