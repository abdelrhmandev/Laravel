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


        DB::table('posts')->delete();
        DB::table('post_translations')->delete();

 

       $items = [
        ['status'=>'1','image'=>'uploads/posts/google.jpg','user_id'=>'1','featured'=>'1'],
        ['status'=>'1','image'=>'uploads/posts/facebook.jpg','user_id'=>'2','featured'=>'1'],
        ['status'=>'0','image'=>'uploads/posts/instagram.jpg','user_id'=>'2','featured'=>'0'],
        ['status'=>'1','image'=>'uploads/posts/tiktok.jpg','user_id'=>'3','featured'=>'1'],
        ['status'=>'0','image'=>'uploads/posts/youtube.jpg','user_id'=>'4','featured'=>'1'],
       ];
       DB::table('posts')->insert($items);      

       $translated_items = [

        ['title'=>'Post Google','slug'=>'post-google','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'1'],
        ['title'=>'مقال جوجل','slug'=>'مقال-جوجل','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'1'],

        ['title'=>'Post Facebook','slug'=>'post-facebook','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'2'],
        ['title'=>'مقال فيسبوك','slug'=>'مقال-فيسبوك','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'2'],

        ['title'=>'Post Instagram','slug'=>'post-instagram','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'3'],
        ['title'=>'مقال انتستاجرام','slug'=>'مقال-انتستاجرام','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'3'],

        ['title'=>'Post Tiktok','slug'=>'post-tiktok','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'4'],
        ['title'=>'مقال تيك توك','slug'=>'مقال-تيك توك','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'4'],

        ['title'=>'Post Youtube','slug'=>'post-youtube','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>'5'],
        ['title'=>'مقال يوتيوب','slug'=>'مقال-يوتيوب','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>'5'],

    ];
       DB::table('post_translations')->insert($translated_items);  

    }
}
