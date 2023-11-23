<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePostCategoryTable extends Migration
{
    public function up(){
        Schema::create('post_category', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->unique(['category_id','post_id']);                  
        });
    }
    public function down(){
        Schema::dropIfExists('post_category');
    }
}
