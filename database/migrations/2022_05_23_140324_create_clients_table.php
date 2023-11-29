<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientsTable extends Migration
{
    public function up(){
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
			$table->string('image',150)->nullable();
			$table->string('link',150)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
    public function down(){
        Schema::dropIfExists('clients');
    }
}
