<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Valoraciones extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('valorations', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("usuario_id");
			$table->double("nota", 5, 1);
			$table->unsignedBigInteger("producto_id");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('valorations');
	}
}
