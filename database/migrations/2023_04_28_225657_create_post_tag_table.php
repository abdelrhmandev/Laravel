<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePostTagTable extends Migration
{
    public function up(){
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->unique(['post_id','tag_id']);       
        });
    }
    public function down(){
        Schema::dropIfExists('post_tag');
    }
}
