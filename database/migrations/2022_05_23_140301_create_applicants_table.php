<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateApplicantsTable extends Migration
{
    public function up(){
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();  
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile',20)->unique();
            $table->string('file');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');            
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }    public function down(){
        Schema::dropIfExists('applicants');
    }
}
