<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
    public function down(){
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('faq_translations');
    }
}