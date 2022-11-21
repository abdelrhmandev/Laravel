<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['published'=>'1','post_category_id'=>'1','image'=>NULL,'user_id'=>'1','featured'=>'1'],
        ['published'=>'1','post_category_id'=>'2','image'=>NULL,'user_id'=>'1','featured'=>'1'],
        ['published'=>'0','post_category_id'=>'3','image'=>NULL,'user_id'=>'1','featured'=>'0'],
        ['published'=>'1','post_category_id'=>'4','image'=>NULL,'user_id'=>'1','featured'=>'1'],
        ['published'=>'0','post_category_id'=>NULL,'image'=>NULL,'user_id'=>'1','featured'=>'1'],
        ['published'=>'0','post_category_id'=>NULL,'image'=>NULL,'user_id'=>'1','featured'=>'0']
       ];
       DB::table('posts')->insert($items);      

       $translated_items = [

        ['title'=>'Post 1','slug'=>'post-1','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'1'],
        ['title'=>'مقال 1','slug'=>'مقال-1','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'1'],

        ['title'=>'Post 2','slug'=>'post-2','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'2'],
        ['title'=>'مقال 2','slug'=>'مقال-2','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'2'],

        ['title'=>'Post 3','slug'=>'post-3','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'3'],
        ['title'=>'مقال 3','slug'=>'مقال-3','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'3'],

        ['title'=>'Post 4','slug'=>'post-4','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'4'],
        ['title'=>'مقال 4','slug'=>'مقال-4','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'4'],

        ['title'=>'Post 5','slug'=>'post-5','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'5'],
        ['title'=>'مقال 5','slug'=>'مقال-5','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'5'],

        ['title'=>'Post 6','slug'=>'post-6','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'6'],
        ['title'=>'مقال 6','slug'=>'مقال-6','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'6'],



    ];
       DB::table('post_translations')->insert($translated_items);  

    }
}
