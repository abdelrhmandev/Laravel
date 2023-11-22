<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void	
	 */
	public function up() {
		Schema::create('sliders', function (Blueprint $table) {
            $table->id();
			$table->string('image',150)->nullable();
			// $table->integer('order')->nullable();
			$table->enum('featured', ['0','1'])->default(1);
			// $table->enum('published', ['0','1'])->default(1);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
			});
		Schema::create('slider_translations', function (Blueprint $table) {            
			$table->id();
			$table->string('title');
			$table->longText('description')->nullable();			
			$table->string('lang')->index();			
			$table->unique(['slider_id','lang']);  
			$table->foreignId('slider_id')->nullable()->constrained('sliders')->onDelete('cascade');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {		
		Schema::dropIfExists('sliders');
		Schema::dropIfExists('slider_translations');
	}
}
