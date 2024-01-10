<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCommentsTable extends Migration
{
    public function up(){
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->enum('status', ['pending','approved','spam','rejected'])->default('pending');            
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreignId('post_id')->nullable()->constrained('posts')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
    public function down(){
        Schema::dropIfExists('comments');
    }
}
