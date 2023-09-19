<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('products')->delete();
        DB::table('product_translations')->delete();

 


       $items = [
        ['published'=>'1','price'=>'160.65','manage_stock'=>'0','in_stock'=>'1','featured'=>'1'],
        ['published'=>'1','price'=>'254.66','manage_stock'=>'0','in_stock'=>'1','featured'=>'1'],
        ['published'=>'0','price'=>'231.33','manage_stock'=>'0','in_stock'=>'1','featured'=>'0'],
        ['published'=>'1','price'=>'324.20','manage_stock'=>'0','in_stock'=>'1','featured'=>'1'],
        ['published'=>'0','price'=>'450.20','manage_stock'=>'0','in_stock'=>'1','featured'=>'1'],
        ['published'=>'0','price'=>'301.36','manage_stock'=>'0','in_stock'=>'1','featured'=>'0']
       ];
       DB::table('products')->insert($items);      

       $translated_items = [

        ['title'=>'product 1','slug'=>'product-1','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'1'],
        ['title'=>'منتج 1','slug'=>'منتج-1','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'1'],

        ['title'=>'product 2','slug'=>'product-2','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'2'],
        ['title'=>'منتج 2','slug'=>'منتج-2','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'2'],

        ['title'=>'product 3','slug'=>'product-3','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'3'],
        ['title'=>'منتج 3','slug'=>'منتج-3','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'3'],

        ['title'=>'product 4','slug'=>'product-4','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'4'],
        ['title'=>'منتج 4','slug'=>'منتج-4','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'4'],

        ['title'=>'product 5','slug'=>'product-5','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'5'],
        ['title'=>'منتج 5','slug'=>'منتج-5','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'5'],

        ['title'=>'product 6','slug'=>'product-6','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','product_id'=>'6'],
        ['title'=>'منتج 6','slug'=>'منتج-6','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','product_id'=>'6'],



    ];
       DB::table('product_translations')->insert($translated_items);  

    }
}
