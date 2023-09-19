<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipelikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('recipe_like')->delete();
 
       $items = [
        
        ['user_id'=>'1','recipe_id'=>'1','likes'=>'1'], 
        ['user_id'=>'2','recipe_id'=>'2','likes'=>'1'],
        ['user_id'=>'3','recipe_id'=>'3','likes'=>'1'],
        ['user_id'=>'1','recipe_id'=>'4','likes'=>'1'],
        ['user_id'=>'3','recipe_id'=>'4','likes'=>'0'], 
        ['user_id'=>'2','recipe_id'=>'3','likes'=>'0'], 
        ['user_id'=>'4','recipe_id'=>'1','likes'=>'0'],         
    ];
       DB::table('recipe_like')->insert($items);      

    }
}
