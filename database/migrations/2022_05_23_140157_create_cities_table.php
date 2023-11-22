<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cities', function (Blueprint $table) {
            $table->id();
			$table->timestamps();
			$table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
			});
		Schema::create('city_translations', function (Blueprint $table) {            
			$table->id();
			$table->string('title');
            $table->string('slug')->unique();
			$table->string('lang')->index();			
			$table->unique(['city_id','lang']);  
			$table->index(['title','slug']);
			$table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
		Schema::dropIfExists('cities');
		Schema::dropIfExists('city_translations');
	}
}
