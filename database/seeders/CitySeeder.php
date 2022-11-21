<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
        ['country_id'=>'62'],
       ];
       DB::table('cities')->insert($items);      
       
       

       $translated_items = [
            ['title'=>'Cairo','slug'=>'cairo','lang'=>'en','city_id'=>'1'],
            ['title'=>'القاهرة','slug'=>'القاهرة','lang'=>'ar','city_id'=>'1'],

            ['title'=>'Alexandria','slug'=>'alexandria','lang'=>'en','city_id'=>'2'],
            ['title'=>'الإسكندرية','slug'=>'الإسكندرية','lang'=>'ar','city_id'=>'2'],

            ['title'=>'Gizeh','slug'=>'gizeh','lang'=>'en','city_id'=>'3'],
            ['title'=>'الجيزة','slug'=>'الجيزة','lang'=>'ar','city_id'=>'3'],

            ['title'=>'Port Said','slug'=>'port-said','lang'=>'en','city_id'=>'4'],
            ['title'=>'بور سعيد','slug'=>'بور سعيد','lang'=>'ar','city_id'=>'4'],

            ['title'=>'Suez','slug'=>'Suez','lang'=>'en','city_id'=>'5'],
            ['title'=>'السويس','slug'=>'السويس','lang'=>'ar','city_id'=>'5'],

            ['title'=>'Luxor','slug'=>'luxor','lang'=>'en','city_id'=>'6'],
            ['title'=>'الأقصر','slug'=>'الأقصر','lang'=>'ar','city_id'=>'6'],

            ['title'=>'Asyut','slug'=>'asyut','lang'=>'en','city_id'=>'7'],
            ['title'=>'أسيوط','slug'=>'أسيوط','lang'=>'ar','city_id'=>'7'],

            ['title'=>'Qena','slug'=>'qena','lang'=>'en','city_id'=>'8'],
            ['title'=>'قنا','slug'=>'قنا','lang'=>'ar','city_id'=>'8'],

            ['title'=>'Arish','slug'=>'arish','lang'=>'en','city_id'=>'9'],
            ['title'=>'العريش','slug'=>'العريش','lang'=>'ar','city_id'=>'9'],

            ['title'=>'Zagazig','slug'=>'zagazig','lang'=>'en','city_id'=>'10'],
            ['title'=>'الزقازيق','slug'=>'الزقازيق','lang'=>'ar','city_id'=>'10'],

            
       ];
       DB::table('city_translations')->insert($translated_items);  

    }
}
