<?php

use DB as Database;
use PragmaRX\Support\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class AddUsesTee extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function migrateUp()
	{
		Schema::table('ci_testers', function(Blueprint $table)
		{
			$table->boolean('require_tee')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function migrateDown()
	{
        Schema::table('ci_testers', function(Blueprint $table)
        {
            $table->dropColumn('require_tee');
        });
	}
}
