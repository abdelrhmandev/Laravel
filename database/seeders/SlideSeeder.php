<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['image'=>'uploads/slides/facebook.jpg','featured'=>'1','published'=>'1'], 
        ['image'=>'uploads/slides/twitter.jpg','featured'=>'0','published'=>'0'], 
        ['image'=>'uploads/slides/amazon.jpg','featured'=>'1','published'=>'1'], 
        ['image'=>'uploads/slides/google.jpg','featured'=>'0','published'=>'0'], 
        ['image'=>'uploads/slides/youtube.jpg','featured'=>'1','published'=>'1'], 
    ];
       DB::table('slides')->insert($items);      

       $translated_items = [
            ['title'=>'Facebook','description'=>'Connect with friends, family and other people you know. Share photos and videos, send messages and get updates','lang'=>'en','slide_id'=>'1'],
            ['title'=>'فيسبوك','description'=>'يمكنك إنشاء حساب أو تسجيل الدخول إلى فيسبوك والتواصل مع الأصدقاء وأفراد العائلة والأشخاص الآخرين الذين تعرفهم. استمتع بمشاركة الصور ومقاطع الفيديو وإرسال','lang'=>'ar','slide_id'=>'1'],

 
            ['title'=>'Twitter','description'=>'From breaking news and entertainment to sports and politics, get the full story with all the live commentary. ','lang'=>'en','slide_id'=>'2'],
            ['title'=>'تويتر','description'=>'تويتر أكثر آمانا هو تويتر أفضل للجميع انضموا للمساحة الخاص','lang'=>'ar','slide_id'=>'2'],


            ['title'=>'Amazon','description'=>'Amazon On Line Shop Stroe Amazon On Line Shop Stroe Amazon On Line Shop Stroe ','lang'=>'en','slide_id'=>'3'],
            ['title'=>'أمازون','description'=>'كل شيء تحبه في سوق.كوم الان اصبح على أمازون مصر. استكشف وتسوّق الالكترونيات، الكمبيوترات، الملابس، الاكسسوارات، الأحذية، الساعات، الأثاث، مستلزمات المنزل','lang'=>'ar','slide_id'=>'3'],

            ['title'=>'Google','description'=>'Search the world s information, including webpages, images, videos and more. Google has many special features to help you find exactly what you are looking','lang'=>'en','slide_id'=>'4'],
            ['title'=>'جوجل','description'=>'جوجل أقوي محرك بحث','lang'=>'ar','slide_id'=>'4'],

            ['title'=>'YouTube','description'=>'Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube ','lang'=>'en','slide_id'=>'5'],
            ['title'=>'يوتيوب','description'=>'يمكنك الاستمتاع بالفيديوهات والموسيقى التي تحبها وتحميل المحتوى الأصلي ومشاركته بكامله مع أصدقائك وأفراد عائلتك والعالم أجمع على YouTube.','lang'=>'ar','slide_id'=>'5'],



       ];
       DB::table('slide_translations')->insert($translated_items);  

    }
}
