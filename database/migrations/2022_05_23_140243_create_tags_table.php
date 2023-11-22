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
            $table->timestamps();
        });
        Schema::create('tag_translations', function (Blueprint $table) {                 
            $table->id();               
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
			$table->string('lang')->index();			
			$table->unique(['tag_id','lang']);  
            $table->index(['title','slug']);
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
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
