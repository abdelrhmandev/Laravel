<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['published'=>'1'],
        ['published'=>'1'],
        ['published'=>'1'],
        ['published'=>'1'],
        ['published'=>'1'],
        
       ];
       DB::table('tags')->insert($items);      

       $translated_items = [


            ['title'=>'Healthy Food','slug'=>'healthy-food','lang'=>'en','tag_id'=>'1'],
            ['title'=>'طعام صحي','slug'=>'طعام-صحي','lang'=>'ar','tag_id'=>'1'],


            ['title'=>'Dessert','slug'=>'dessert','lang'=>'en','tag_id'=>'2'],
            ['title'=>'حلوى','slug'=>'حلوى','lang'=>'ar','tag_id'=>'2'],

            ['title'=>'Chicken Wings','slug'=>'chicken-wings','lang'=>'en','tag_id'=>'3'],
            ['title'=>'أجنحه دجاج','slug'=>'أجنحه-دجاج','lang'=>'ar','tag_id'=>'3'],      


            ['title'=>'Rice','slug'=>'rice','lang'=>'en','tag_id'=>'4'],
            ['title'=>'أرز','slug'=>'أرز','lang'=>'ar','tag_id'=>'4'],      


            ['title'=>'Beef','slug'=>'beef','lang'=>'en','tag_id'=>'5'],
            ['title'=>'لحم بيف','slug'=>'لحم-بيف','lang'=>'ar','tag_id'=>'5'],

       ];
       DB::table('tag_translations')->insert($translated_items);  

    }
}
