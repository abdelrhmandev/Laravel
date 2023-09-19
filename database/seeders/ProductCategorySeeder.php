<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('product_categories')->delete();
        DB::table('product_categories_translations')->delete();


       $items = [
        ['published'=>'1'],
        ['published'=>'1'],
        ['published'=>'1'],
        ['published'=>'0'],
        ['published'=>'1'],
  
       ];
       DB::table('product_categories')->insert($items);      
       
       

       $translated_items = [

            ['title'=>'Men\'s Fashion','slug'=>'mens-fashion','lang'=>'en','product_category_id'=>'1'],
            ['title'=>'ملابس رجال','slug'=>'ملابس-رجال','lang'=>'ar','product_category_id'=>'1'],

            ['title'=>'Women\'s Fashion','slug'=>'womens-fashion','lang'=>'en','product_category_id'=>'2'],
            ['title'=>'ملابس سيدات','slug'=>'ملابس-سيدات','lang'=>'ar','product_category_id'=>'2'],

            ['title'=>'Watches','slug'=>'watches','lang'=>'en','product_category_id'=>'3'],
            ['title'=>'ساعات','slug'=>'ساعات','lang'=>'ar','product_category_id'=>'3'],

            ['title'=>'Glasses','slug'=>'glasses','lang'=>'en','product_category_id'=>'4'],
            ['title'=>'نظارات','slug'=>'نظارات','lang'=>'ar','product_category_id'=>'4'],

            ['title'=>'Mobiles','slug'=>'mobiles','lang'=>'en','product_category_id'=>'5'],
            ['title'=>'موبايلات','slug'=>'موبايلات','lang'=>'ar','product_category_id'=>'5'],  
            
       ];
       DB::table('product_categories_translations')->insert($translated_items);  

    }
}
