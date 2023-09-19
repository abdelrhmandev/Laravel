<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('recipe_categories')->delete();
        DB::table('recipe_categories_translations')->delete();



       $items = [
        ['image'=>'uploads/recipe_categories/snack.jpg','published'=>'1'], 
        ['image'=>'uploads/recipe_categories/soup.jpg','published'=>'1'],
        ['image'=>'uploads/recipe_categories/chicken.jpg','published'=>'0'],
        ['image'=>'uploads/recipe_categories/beef.jpg','published'=>'0'],
        ['image'=>'uploads/recipe_categories/pasta.jpg','published'=>'0'],
 
    ];
       DB::table('recipe_categories')->insert($items);      

       $translated_items = [

        ['title'=>'Snacks','slug'=>'Snacks','description'=>'Snacks','lang'=>'en','category_id'=>'1'],
        ['title'=>'وجبات خفيفة','slug'=>'وجبات-خفيفة','description'=>'وجبات خفيفة','lang'=>'ar','category_id'=>'1'],


        ['title'=>'Soups','slug'=>'blt-pasta','description'=>'Soups Soups ','lang'=>'en','category_id'=>'2'],
        ['title'=>'شوربه','slug'=>'شوربه','description'=>'شوربه شوربه ','lang'=>'ar','category_id'=>'2'],





        ['title'=>'Chicken','slug'=>'Chicken','description'=>'Chicken Chicken','lang'=>'en','category_id'=>'3'],
        ['title'=>'دجاج','slug'=>'دجاج','description'=>'دجاج دجاج ','lang'=>'ar','category_id'=>'3'],

        ['title'=>'Beef','slug'=>'beef','description'=>'Beef Beef ','lang'=>'en','category_id'=>'4'],
        ['title'=>'لحم بقري','slug'=>'لحم-بقري','description'=> 'لحم بقري لحم بقري','lang'=>'ar','category_id'=>'4'],


        ['title'=>'Pasta','slug'=>'pasta','description'=>'Pasta Pasta ','lang'=>'en','category_id'=>'5'],
        ['title'=>'مكرونه','slug'=>'مكرونه','description'=>'مكرونه مكرونه','lang'=>'ar','category_id'=>'5'],


 


       ];
       DB::table('recipe_categories_translations')->insert($translated_items);  

    }
}
