<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('banners')->delete();
        DB::table('banner_translations')->delete();

 
        

       $items = [
        ['published'=>'1','image'=>'uploads/banners/1.jpg'],
        ['published'=>'1','image'=>'uploads/banners/2.jpg'],
        ['published'=>'1','image'=>'uploads/banners/3.jpg'],
        ['published'=>'1','image'=>'uploads/banners/4.jpg'],
        ['published'=>'1','image'=>'uploads/banners/5.jpg'],
        
       ];
       DB::table('banners')->insert($items);      

       $translated_items = [

            ['title'=>'Banner1','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','banner_id'=>'1'],
            ['title'=>'بنر 1','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','banner_id'=>'1'],

            ['title'=>'Banner2','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','banner_id'=>'2'],
            ['title'=>'بنر 2','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','banner_id'=>'2'],

            ['title'=>'Banner3','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','banner_id'=>'3'],
            ['title'=>'بنر 3','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','banner_id'=>'3'],      

            ['title'=>'Banner4','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','banner_id'=>'4'],
            ['title'=>'بنر 4','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','banner_id'=>'4'],      

            ['title'=>'Banner5','description'=>'Lorem ipsum, or lipsum as it is sometimes known','lang'=>'en','banner_id'=>'5'],
            ['title'=>'بنر 5','description'=>'وريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل','lang'=>'ar','banner_id'=>'5'],      

       ];
       DB::table('banner_translations')->insert($translated_items);  

    }
}
