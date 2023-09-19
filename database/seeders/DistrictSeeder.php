<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('districts')->delete();
        DB::table('district_translations')->delete();


 
        
       $items = [
        ['area_id'=>'1'], // cairo , Zamalek
 
        ['area_id'=>'3'], // cairo , Heliopolis
        ['area_id'=>'3'], // cairo , Heliopolis
        ['area_id'=>'3'], // cairo , Heliopolis
        ['area_id'=>'3'], // cairo , Heliopolis
        ['area_id'=>'3'], // cairo , Heliopolis


        ['area_id'=>'4'], // cairo , Nasr City
        ['area_id'=>'4'], // cairo , Nasr City
        ['area_id'=>'4'], // cairo , Nasr City
        ['area_id'=>'4'], // cairo , Nasr City

        

        
       ];
       DB::table('districts')->insert($items);      

       $translated_items = [


            ['title'=>'Cairo Opera House','slug'=>'cairo-opera-house','lang'=>'en','district_id'=>'1'],
            ['title'=>'دار الأوبرا المصريه','slug'=>'دار-الأوبرا-المصريه','lang'=>'ar','district_id'=>'1'],


            ['title'=>'El Horreya Mall','slug'=>'el-horreya-mall','lang'=>'en','district_id'=>'2'],
            ['title'=>'حريه مول','slug'=>'حريه-مول','lang'=>'ar','district_id'=>'2'],

            ['title'=>'El Korba','slug'=>'el-korba','lang'=>'en','district_id'=>'3'],
            ['title'=>'الكوربة','slug'=>'الكوربه','lang'=>'ar','district_id'=>'3'],

            ['title'=>'El Oroba','slug'=>'el-oroba','lang'=>'en','district_id'=>'4'],
            ['title'=>'العروبة','slug'=>'العروبة','lang'=>'ar','district_id'=>'4'],

            ['title'=>'Ard El Golf','slug'=>'Ard El-Golf','lang'=>'en','district_id'=>'5'],
            ['title'=>'ارض الجولف','slug'=>'ارض-الجولف','lang'=>'ar','district_id'=>'5'],

            ['title'=>'Al-Ismailia Square','slug'=>'al-ismailia-square','lang'=>'en','district_id'=>'6'],
            ['title'=>'ميدان الإسماعيلية','slug'=>'ميدان-الإسماعيلية','lang'=>'ar','district_id'=>'6'],    

            


            ['title'=>'Abbas al-Aqqad','slug'=>'abbas-al-aqqad','lang'=>'en','district_id'=>'7'],
            ['title'=>'عباس العقاد','slug'=>'عباس-العقاد','lang'=>'ar','district_id'=>'7'],

            ['title'=>'Makram Ebeid','slug'=>'makram-ebeid','lang'=>'en','district_id'=>'8'],
            ['title'=>'مكرم عبيد','slug'=>'مكرم-عبيد','lang'=>'ar','district_id'=>'8'],      


            ['title'=>'Mostafa El-Nahas','slug'=>'mostafa-el-nahas','lang'=>'en','district_id'=>'9'],
            ['title'=>'مصطفي النحاس','slug'=>'مصطفي-النحاس','lang'=>'ar','district_id'=>'9'],      




            ['title'=>'Salah Salem','slug'=>'salah-salem','lang'=>'en','district_id'=>'10'],
            ['title'=>'صلاح سالم','slug'=>'صلاح-سالم','lang'=>'ar','district_id'=>'10'],    




       ];
       DB::table('district_translations')->insert($translated_items);  

    }
}
