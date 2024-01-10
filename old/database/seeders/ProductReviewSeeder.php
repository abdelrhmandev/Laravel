<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('product_reviews')->delete();
        
        $items = [
        
            ['product_id'=>'1','user_id'=>'1','comment'=>'Good product'], 
            ['product_id'=>'2','user_id'=>'2','comment'=>'Not Good product'],
            ['product_id'=>'3','user_id'=>'3','comment'=>'Hello New Go'],
            ['product_id'=>'4','user_id'=>'1','comment'=>'Test Comment'],
            ['product_id'=>'4','user_id'=>'3','comment'=>'Bravoo Commeta'], 
            ['product_id'=>'3','user_id'=>'2','comment'=>'Google Eearth Comment'], 
            ['product_id'=>'1','user_id'=>'4','comment'=>'Visual Media'],         
        ];
           DB::table('product_reviews')->insert($items);      
    
    }
}
