<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Komentar extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('komentar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("id_user");
			$table->integer("id_tulisan");
			$table->string("tipe");
			$table->text("isi");;
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
		Schema::drop('komentar');
	}

}
