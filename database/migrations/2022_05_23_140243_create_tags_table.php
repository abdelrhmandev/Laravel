<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->enum('published', ['0','1'])->default(1);
			$table->softDeletes(); //////Option 
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

       });
        Schema::create('tag_translations', function (Blueprint $table) {                 
            $table->id();  
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('lang')->index();	
			$table->unique(['tag_id','lang']);  
            $table->index(['title','slug']);
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('cascade');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_translations');
    }
}
