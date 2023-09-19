<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('areas')->delete();
        DB::table('area_translations')->delete();


 

       $items = [
        ['city_id'=>'1'], // cairo
        ['city_id'=>'1'], // cairo
        ['city_id'=>'1'], // cairo
        ['city_id'=>'1'], // cairo
        ['city_id'=>'1'], // cairo

        ['city_id'=>'2'], // alex
        ['city_id'=>'2'], // alex
   

        ['city_id'=>'3'], // giza
        ['city_id'=>'3'], // giza
        ['city_id'=>'3'], // giza

       ];
       DB::table('areas')->insert($items);      

       $translated_items = [
           // cairo
            ['title'=>'Zamalek','slug'=>'zamalek','lang'=>'en','area_id'=>'1'],
            ['title'=>'الزمالك','slug'=>'الزمالك','lang'=>'ar','area_id'=>'1'],

            ['title'=>'Maadi','slug'=>'maadi','lang'=>'en','area_id'=>'2'],
            ['title'=>'المعادي','slug'=>'المعادي','lang'=>'ar','area_id'=>'2'],

            ['title'=>'Heliopolis','slug'=>'heliopolis','lang'=>'en','area_id'=>'3'],
            ['title'=>'مصر الجديده','slug'=>'مصر-الجديده','lang'=>'ar','area_id'=>'3'],

            ['title'=>'Nasr City','slug'=>'nasr-city','lang'=>'en','area_id'=>'4'],
            ['title'=>'مدينة نصر','slug'=>'مدينة-نصر','lang'=>'ar','area_id'=>'4'],            

            ['title'=>'New Cairo','slug'=>'New Cairo','lang'=>'en','area_id'=>'5'],
            ['title'=>'القاهرة الجديده','slug'=>'القاهرة-الجديده','lang'=>'ar','area_id'=>'5'],
 
            // Alex
            ['title'=>'Borg Al Arab','slug'=>'borg-al-arab','lang'=>'en','area_id'=>'6'],
            ['title'=>'برج العرب','slug'=>'برج-العرب','lang'=>'ar','area_id'=>'6'],

            ['title'=>'Smoha','slug'=>'smoha','lang'=>'en','area_id'=>'7'],
            ['title'=>'سموحه','slug'=>'سموحه','lang'=>'ar','area_id'=>'7'],

            // Giza
            ['title'=>'6th of October City','slug'=>'6th-of-october-city','lang'=>'en','area_id'=>'8'],
            ['title'=>'السادس من أكتوبر','slug'=>'السادس-من-أكتوبر','lang'=>'ar','area_id'=>'8'],

            ['title'=>'Sheikh Zayed','slug'=>'sheikh-zayed','lang'=>'en','area_id'=>'9'],
            ['title'=>'الشيخ زايد','slug'=>'الشيخ-زايد','lang'=>'ar','area_id'=>'9'],

            ['title'=>'Agouza','slug'=>'agouza','lang'=>'en','area_id'=>'10'],
            ['title'=>'العجوزة','slug'=>'العجوزة','lang'=>'ar','area_id'=>'10'],            



       ];
       DB::table('area_translations')->insert($translated_items);  

    }
}
