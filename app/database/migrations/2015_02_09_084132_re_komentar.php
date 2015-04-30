<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReKomentar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('re_komentar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("id_komentar");
			$table->integer("id_user");
			$table->integer("tipe");
			$table->text("isi");
			$table->enum("read",array("0","1"));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('re_komentar');
	}

}
