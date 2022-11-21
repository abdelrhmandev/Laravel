<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipeReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['user_id'=>'1','recipe_id'=>'1','comment'=>'Good recipe i like it much','rate'=>'1'], 
        ['user_id'=>'1','recipe_id'=>'2','comment'=>'sorry i dont like it','rate'=>'1'], 

        ['user_id'=>'2','recipe_id'=>'2','comment'=>'Not bad for me','rate'=>'1'],
        ['user_id'=>'3','recipe_id'=>'3','comment'=>'greate recipe i like','rate'=>'1'],
        ['user_id'=>'2','recipe_id'=>'4','comment'=>'very bad recipe','rate'=>'1'],

        
    ];
       DB::table('comment_recipe')->insert($items);      

    }
}
