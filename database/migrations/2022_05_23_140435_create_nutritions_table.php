<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('nutritions', function (Blueprint $table) {
            $table->id();
			$table->enum('published', ['0','1'])->default(1);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
			});
		Schema::create('nutrition_translations', function (Blueprint $table) {            
			$table->id();
			$table->string('title');
			$table->string('lang')->index();			
			$table->unique(['nutrition_id','lang']); 
			$table->index(['title']); 
			$table->foreignId('nutrition_id')->constrained('nutritions')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
		Schema::dropIfExists('nutritions');
		Schema::dropIfExists('nutrition_translations');
	}
}
