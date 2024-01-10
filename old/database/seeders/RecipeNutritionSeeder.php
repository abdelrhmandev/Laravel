<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RecipenutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('nutrition_recipe')->delete();

        
       $items = [
        ['nutrition_id'=>'1','recipe_id'=>'1','value'=>'30'], 
        ['nutrition_id'=>'1','recipe_id'=>'2','value'=>'45'], 
        ['nutrition_id'=>'2','recipe_id'=>'2','value'=>'12'],
        ['nutrition_id'=>'3','recipe_id'=>'3','value'=>'23'],
        ['nutrition_id'=>'2','recipe_id'=>'4','value'=>'44'],
        ['nutrition_id'=>'1','recipe_id'=>'5','value'=>'150'],
        ['nutrition_id'=>'5','recipe_id'=>'2','value'=>'361'],
        ['nutrition_id'=>'4','recipe_id'=>'6','value'=>'166'],
        ['nutrition_id'=>'3','recipe_id'=>'7','value'=>'18'],
    ];
       DB::table('nutrition_recipe')->insert($items);      

    }
}
