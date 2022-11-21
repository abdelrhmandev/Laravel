<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
        
            ['post_id'=>'1','user_id'=>'1','comment'=>'Good Post'], 
            ['post_id'=>'2','user_id'=>'2','comment'=>'Not Good Post'],
            ['post_id'=>'3','user_id'=>'3','comment'=>'Hello New Go'],
            ['post_id'=>'4','user_id'=>'1','comment'=>'Test Comment'],
            ['post_id'=>'4','user_id'=>'3','comment'=>'Bravoo Commeta'], 
            ['post_id'=>'3','user_id'=>'2','comment'=>'Google Eearth Comment'], 
            ['post_id'=>'1','user_id'=>'4','comment'=>'Visual Media'],         
        ];
           DB::table('post_comments')->insert($items);      
    
    }
}
