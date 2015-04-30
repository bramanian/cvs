<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArtikelCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artikel', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("id_user");
			$table->integer("id_kategori");
			$table->integer("id_tag");
			$table->string("judul");
			$table->text("isi");
			$table->string("desc");
			$table->string("photo");
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
		Schema::drop('artikel');
	}

}
