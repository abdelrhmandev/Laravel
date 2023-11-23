<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSettingsTable extends Migration
{
    public function up(){
        Schema::create('settings', function (Blueprint $table) {
            $table->id();               
            $table->string('key')->unique();
            $table->boolean('is_translatable')->default(false);
            $table->text('plain_value')->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained('settings')->onDelete('cascade')->constrained();               
            $table->string('lang');
            $table->longText('value')->nullable();
            $table->unique(['setting_id','lang']);            
        });
    }
    public function down(){
        Schema::dropIfExists('settings');
        Schema::dropIfExists('setting_translations');
    }
}
