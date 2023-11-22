<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('districts', function (Blueprint $table) {
            $table->id();
			$table->timestamps();
			$table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('cascade');
			});
		Schema::create('district_translations', function (Blueprint $table) {            
			$table->id();
			$table->string('title');
            $table->string('slug')->unique();
			$table->string('lang')->index();			
			$table->unique(['district_id','lang']);  
            $table->index(['title','slug']);
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');

		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
		Schema::dropIfExists('districts');
		Schema::dropIfExists('district_translations');
	}
}
