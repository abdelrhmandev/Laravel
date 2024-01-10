<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCountriesTable extends Migration
{
    public function up(){
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('code',20)->unique();
            $table->string('flag')->nullable();
        });
    }
    public function down(){
        Schema::dropIfExists('countries');
    }
}
