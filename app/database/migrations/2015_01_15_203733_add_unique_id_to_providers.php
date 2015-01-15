<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueIdToProviders extends Migration {

	public function up()
	{
		Schema::table('items', function($table)
	    {
	        $table->string('provider_unique_id')->nullable()->default(null);
		});
	}

	public function down()
	{
		Schema::table('items', function($table)
		{
		    $table->dropColumn('provider_unique_id');
		});
	}

}
