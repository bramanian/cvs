<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileAdminCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('profile_admin', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("id_admin")->unsigned();
			$table->foreign("id_admin")->references("id")->on("admin");
			$table->string('nama');
			$table->date('tgl_lahir');
			$table->enum('jenis_kelamin',array("l","p"));
			$table->string("alamat");
			$table->integer("id_provisi");
			$table->integer("id_kota");
			$table->string("no_telepon");
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
		Schema::drop('profile_admin');
	}

}
