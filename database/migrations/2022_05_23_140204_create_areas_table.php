<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('areas', function (Blueprint $table) {
            $table->id();
			$table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');
			});
		Schema::create('area_translations', function (Blueprint $table) {            
			$table->id();
			$table->string('title');
            $table->string('slug')->unique();
			$table->string('lang')->index();			
			$table->unique(['area_id','lang']);  
			$table->index(['title','slug']);
			$table->foreignId('area_id')->constrained('areas')->onDelete('cascade');

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
		Schema::dropIfExists('areas');
		Schema::dropIfExists('area_translations');
	}
}
