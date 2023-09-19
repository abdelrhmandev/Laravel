<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comments')->delete();
 

        
        $items = [
        
            ['post_id'=>'1','user_id'=>'1','rating'=>'4','comment'=>'Good Post'], 
            ['post_id'=>'2','user_id'=>'2','rating'=>'0','comment'=>'Not Good Post'],
            ['post_id'=>'3','user_id'=>'3','rating'=>'1','comment'=>'Hello New Go'],
            ['post_id'=>'4','user_id'=>'1','rating'=>'2','comment'=>'Test Comment'],
            ['post_id'=>'4','user_id'=>'3','rating'=>'5','comment'=>'Bravoo Commeta'], 
            ['post_id'=>'3','user_id'=>'2','rating'=>'3','comment'=>'Google Eearth Comment'], 
            ['post_id'=>'1','user_id'=>'4','rating'=>'4','comment'=>'Visual Media'],         
        ];
           DB::table('comments')->insert($items);      
    
    }
}
