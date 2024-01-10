<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            ['post_id'=>'1','user_id'=>'1','comment'=>'The wolves stopped in their tracks, sizing up the mother and her cubs','created_at'=>Carbon::now()->subDay(20),'created_at'=>Carbon::now()->subDay(10)], 
            ['post_id'=>'2','user_id'=>'2','comment'=>'She counted. One. She could hear the steps coming closer','created_at'=>Carbon::now()->subDay(21)],
            ['post_id'=>'3','user_id'=>'3','comment'=>'One foot in front of the other, One more step, and then one more','created_at'=>Carbon::now()->subDay(22)],
            ['post_id'=>'5','user_id'=>'1','comment'=>'Always be a little vague and keep them guessing','created_at'=>Carbon::now()->subDay(23)],
            ['post_id'=>'4','user_id'=>'3','comment'=>'It was something about the trees. The way they swayed with the wind in unison.','created_at'=>Carbon::now()->subDay(24)], 
            ['post_id'=>'3','user_id'=>'2','comment'=>'The rain was coming','created_at'=>Carbon::now()->subDay(25)], 
            ['post_id'=>'1','user_id'=>'4','comment'=>'She has seen this scene before','created_at'=>Carbon::now()->subDay(26)],                         
            ['post_id'=>'1','user_id'=>'2','comment'=>'Sometimes thats just the way it has to be. Sure, there were probably other options','created_at'=>Carbon::now()->subDay(27)], 
            ['post_id'=>'2','user_id'=>'10','comment'=>'Things aren\'t going well at all with mom today','created_at'=>Carbon::now()->subDay(28)],
            ['post_id'=>'3','user_id'=>'4','comment'=>'The headache wouldn\'t go away','created_at'=>Carbon::now()->subDay(29)],
            ['post_id'=>'5','user_id'=>'7','comment'=>'It was a scrape that he hardly noticed','created_at'=>Carbon::now()->subDay(30)],
            ['post_id'=>'4','user_id'=>'8','comment'=>'He scolded himself for being so tentative','created_at'=>Carbon::now()->subDay(10)], 
            ['post_id'=>'3','user_id'=>'2','comment'=>'My pincher collar is snapped on. Then comes the electric zapper collar','created_at'=>Carbon::now()->subDay(15)], 
            ['post_id'=>'1','user_id'=>'9','comment'=>'She had come to the conclusion that you could tell a lot about a person by their ears','created_at'=>Carbon::now()->subDay(12)],  
            ['post_id'=>'10','user_id'=>'5','comment'=>'The bush began to shake. Brad couldn\'t see what was causing it to shake','created_at'=>Carbon::now()->subDay(13)], 
            ['post_id'=>'9','user_id'=>'6','comment'=>'The things out there that are unknown aren\'t scary in themselves','created_at'=>Carbon::now()->subDay(14)],
            ['post_id'=>'8','user_id'=>'7','comment'=>'They are just unknown at the moment','created_at'=>Carbon::now()->subDay(15)],
            ['post_id'=>'7','user_id'=>'8','comment'=>'The box sat on the desk next to the computer','created_at'=>Carbon::now()->subDay(16)],
            ['post_id'=>'7','user_id'=>'9','comment'=>'It was always the Monday mornings. It never seemed to happen on Tuesday morning','created_at'=>Carbon::now()->subDay(17)], 
            ['post_id'=>'5','user_id'=>'10','comment'=>'He ordered his regular breakfast. Two eggs sunnyside up','created_at'=>Carbon::now()->subDay(18)], 
            ['post_id'=>'1','user_id'=>'10','comment'=>'The alarm went off at exactly 6:00 AM as it had every morning for the past five years','created_at'=>Carbon::now()->subDay(19)],  
        ];
           DB::table('comments')->insert($items);      
    
    }
}
