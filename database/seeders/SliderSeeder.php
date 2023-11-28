<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SliderSeeder extends Seeder
{
    public function run(){
        DB::table('sliders')->delete();
        DB::table('slider_translations')->delete();

       $items = [
        ['image'=>'uploads/sliders/facebook.jpg','status'=>'1'], 
        ['image'=>'uploads/sliders/twitter.jpg','status'=>'0'], 
        ['image'=>'uploads/sliders/amazon.jpg','status'=>'1'], 
        ['image'=>'uploads/sliders/google.jpg','status'=>'0'], 
        ['image'=>'uploads/sliders/youtube.jpg','status'=>'1'], 
    ];
       DB::table('sliders')->insert($items);      

       $translated_items = [
            ['title'=>'Facebook','description'=>'Connect with friends, family and other people you know. Share photos and videos, send messages and get updates','lang'=>'en','slider_id'=>'1'],
            ['title'=>'فيسبوك','description'=>'يمكنك إنشاء حساب أو تسجيل الدخول إلى فيسبوك والتواصل مع الأصدقاء وأفراد العائلة والأشخاص الآخرين الذين تعرفهم. استمتع بمشاركة الصور ومقاطع الفيديو وإرسال','lang'=>'ar','slider_id'=>'1'],
 
            ['title'=>'Twitter','description'=>'From breaking news and entertainment to sports and politics, get the full story with all the live commentary. ','lang'=>'en','slider_id'=>'2'],
            ['title'=>'تويتر','description'=>'تويتر أكثر آمانا هو تويتر أفضل للجميع انضموا للمساحة الخاص','lang'=>'ar','slider_id'=>'2'],


            ['title'=>'Amazon','description'=>'Amazon On Line Shop Stroe Amazon On Line Shop Stroe Amazon On Line Shop Stroe ','lang'=>'en','slider_id'=>'3'],
            ['title'=>'أمازون','description'=>'كل شيء تحبه في سوق.كوم الان اصبح على أمازون مصر. استكشف وتسوّق الالكترونيات، الكمبيوترات، الملابس، الاكسسوارات، الأحذية، الساعات، الأثاث، مستلزمات المنزل','lang'=>'ar','slider_id'=>'3'],

            ['title'=>'Google','description'=>'Search the world s information, including webpages, images, videos and more. Google has many special features to help you find exactly what you are looking','lang'=>'en','slider_id'=>'4'],
            ['title'=>'جوجل','description'=>'جوجل أقوي محرك بحث','lang'=>'ar','slider_id'=>'4'],

            ['title'=>'YouTube','description'=>'Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube ','lang'=>'en','slider_id'=>'5'],
            ['title'=>'يوتيوب','description'=>'يمكنك الاستمتاع بالفيديوهات والموسيقى التي تحبها وتحميل المحتوى الأصلي ومشاركته بكامله مع أصدقائك وأفراد عائلتك والعالم أجمع على YouTube.','lang'=>'ar','slider_id'=>'5'],

       ];
       DB::table('slider_translations')->insert($translated_items);  

    }
}
