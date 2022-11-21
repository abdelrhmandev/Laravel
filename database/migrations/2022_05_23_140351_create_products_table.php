<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable  extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();               
                $table->foreignId('brand_id')->nullable()->constrained('brands');
                $table->string('image',150)->nullable();
                $table->enum('published', ['0','1'])->default(1);
                $table->boolean('featured')->default(0);
                $table->decimal('price', 18, 4)->unsigned();
                $table->decimal('special_price', 18, 4)->unsigned()->nullable();
                $table->string('special_price_type')->nullable();
                $table->date('special_price_start')->nullable();
                $table->date('special_price_end')->nullable();
                $table->decimal('selling_price', 18, 4)->unsigned()->nullable();
                $table->string('sku')->nullable();
                $table->boolean('manage_stock');
                $table->integer('quantity')->nullable();
                $table->boolean('in_stock');
                $table->integer('viewed')->unsigned()->default(0);                 
                $table->index(['sku']);
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                });  

            Schema::create('product_translations', function (Blueprint $table) {
                $table->id();               
                $table->string('title');
                $table->string('slug')->unique();
                $table->longText('description')->nullable();
                $table->string('meta_title')->nullable();
                $table->longText('meta_description')->nullable();    
                $table->string('lang')->index();			
                $table->unique(['product_id','lang']);  
                $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            });  
    
            }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('products');
            Schema::drop('product_translations');
        }    
}  
