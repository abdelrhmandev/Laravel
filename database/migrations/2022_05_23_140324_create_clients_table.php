<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
			$table->string('image',150)->nullable();
			$table->string('link',255)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('client_translations', function (Blueprint $table) {                 
            $table->id();               
            $table->string('title');
			$table->string('lang')->index();			
			$table->unique(['client_id','lang']);  
            $table->index(['title']);
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('client_translations');
    }
}
