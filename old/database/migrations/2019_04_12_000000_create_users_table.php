<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{

    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('mobile',20)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('is_admin', ['0','1'])->default(1);
            $table->enum('status', ['0','1'])->default(1);
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('users');
    }
}
