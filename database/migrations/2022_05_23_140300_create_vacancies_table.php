<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateVacanciesTable extends Migration
{
    public function up(){
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();  
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['1','0'])->default('1');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
       });
    }
    public function down(){
        Schema::dropIfExists('vacancies');
    }
}
