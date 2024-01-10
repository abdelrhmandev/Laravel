<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePostMediaTable extends Migration
{
    public function up(){
        Schema::create('post_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->string('assigned_for',150);
            $table->string('file',150);
        });
    }
    public function down(){
        Schema::dropIfExists('post_media');
    }
}
