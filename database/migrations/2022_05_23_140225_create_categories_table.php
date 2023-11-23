<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCategoriesTable extends Migration
{
    public function up(){
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(NULL)->nullable();
			$table->string('image',150)->default(NULL)->nullable();
			$table->enum('status', ['0','1'])->default(1);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('category_translations', function (Blueprint $table) {                 
            $table->id();               
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
			$table->string('lang')->index();			
			$table->unique(['category_id','lang']);  
            $table->index(['title','slug']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });	
    }
    public function down(){
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_translations');
    }
}
