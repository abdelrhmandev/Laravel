<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('post_tag', function (Blueprint $table) {
                $table->id();
                $table->unique(['post_id', 'tag_id']);
                $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
                $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            });  
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('post_tag');
        }    
}  
