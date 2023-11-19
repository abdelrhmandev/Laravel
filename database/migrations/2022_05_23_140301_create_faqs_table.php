<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

       });
        Schema::create('faq_translations', function (Blueprint $table) {                 
            $table->id();  
            $table->string('question');
            $table->text('answer');
			$table->string('lang')->index();			
			$table->unique(['faq_id','lang']);  
            $table->index(['question']);
            $table->foreignId('faq_id')->constrained('faqs')->onDelete('cascade');
            });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('faq_translations');
    }
}
