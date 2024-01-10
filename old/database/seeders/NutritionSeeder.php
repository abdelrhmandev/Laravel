<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('nutritions')->delete();
        DB::table('nutrition_translations')->delete();


 
        

        $items = [
            [],
            [],
            [],
            [],
            [],
    ];
       DB::table('nutritions')->insert($items);      

       $translated_items = [
            ['title'=>'Calories','lang'=>'en','nutrition_id'=>'1'],
            ['title'=>'سعر حراري','lang'=>'ar','nutrition_id'=>'1'],

 
            ['title'=>'Fats','lang'=>'en','nutrition_id'=>'2'],
            ['title'=>'الدهون','lang'=>'ar','nutrition_id'=>'2'],

            ['title'=>'Calcium','lang'=>'en','nutrition_id'=>'3'],
            ['title'=>'الكالسيوم','lang'=>'ar','nutrition_id'=>'3'],


  
            ['title'=>'Carbs','lang'=>'en','nutrition_id'=>'4'],
            ['title'=>'الكربوهيدرات','lang'=>'ar','nutrition_id'=>'4'],

            ['title'=>'Sugars','lang'=>'en','nutrition_id'=>'5'],
            ['title'=>'السكريات','lang'=>'ar','nutrition_id'=>'5'],

       ];
       DB::table('nutrition_translations')->insert($translated_items);  

    }
}
