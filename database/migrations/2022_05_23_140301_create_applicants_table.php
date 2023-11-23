<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile',20)->unique();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->enum('status', ['pending','approved','spam','rejected'])->default('pending');            
            $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
