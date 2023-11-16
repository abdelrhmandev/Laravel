<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->delete();
        DB::table('post_translations')->delete();
       $items = [
        ['status'=>'1','image'=>'uploads/posts/1.jpg','user_id'=>'1','featured'=>'1','allow_comments'=>'1'],
        ['status'=>'1','image'=>'uploads/posts/2.jpg','user_id'=>'2','featured'=>'1','allow_comments'=>'0'],
        ['status'=>'0','image'=>'uploads/posts/3.jpg','user_id'=>'2','featured'=>'0','allow_comments'=>'1'],
        ['status'=>'1','image'=>'uploads/posts/4.jpg','user_id'=>'7','featured'=>'1','allow_comments'=>'1'],
        ['status'=>'0','image'=>'uploads/posts/5.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'0'],
        ['status'=>'1','image'=>'uploads/posts/6.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'1'],
        ['status'=>'0','image'=>'uploads/posts/7.jpg','user_id'=>'8','featured'=>'0','allow_comments'=>'0'],
        ['status'=>'1','image'=>'uploads/posts/8.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'1'],
        ['status'=>'0','image'=>'uploads/posts/9.jpg','user_id'=>'5','featured'=>'1','allow_comments'=>'1'],
        ['status'=>'1','image'=>'uploads/posts/10.jpg','user_id'=>'1','featured'=>'0','allow_comments'=>'0'],
       ];
       DB::table('posts')->insert($items);      

       for($i=1;$i<=10;$i++){
            $translated_items = [        
                    ['title'=>'Post Lorem ipsum Test' .$i,'slug'=>'post-loremvipsum-test'.$i,'description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','post_id'=>$i],
                    ['title'=>$i. ' مقال وريم ايبسوم هو نموذج افتراضي','slug'=>$i.'-مقال-وريم-ايبسوم-هو-نموذج-افتراضي','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','post_id'=>$i],
                ];
            DB::table('post_translations')->insert($translated_items);     
         }      
    }
}
