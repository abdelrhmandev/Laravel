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
            ['post_id'=>'1','user_id'=>'1','comment'=>'The wolves stopped in their tracks, sizing up the mother and her cubs'], 
            ['post_id'=>'2','user_id'=>'2','comment'=>'She counted. One. She could hear the steps coming closer'],
            ['post_id'=>'3','user_id'=>'3','comment'=>'One foot in front of the other, One more step, and then one more'],
            ['post_id'=>'5','user_id'=>'1','comment'=>'Always be a little vague and keep them guessing'],
            ['post_id'=>'4','user_id'=>'3','comment'=>'It was something about the trees. The way they swayed with the wind in unison.'], 
            ['post_id'=>'3','user_id'=>'2','comment'=>'The rain was coming'], 
            ['post_id'=>'1','user_id'=>'4','comment'=>'She has seen this scene before'],                         
            ['post_id'=>'1','user_id'=>'2','comment'=>'Sometimes thats just the way it has to be. Sure, there were probably other options'], 
            ['post_id'=>'2','user_id'=>'10','comment'=>'Things aren\'t going well at all with mom today'],
            ['post_id'=>'3','user_id'=>'4','comment'=>'The headache wouldn\'t go away'],
            ['post_id'=>'5','user_id'=>'7','comment'=>'It was a scrape that he hardly noticed'],
            ['post_id'=>'4','user_id'=>'8','comment'=>'He scolded himself for being so tentative'], 
            ['post_id'=>'3','user_id'=>'2','comment'=>'My pincher collar is snapped on. Then comes the electric zapper collar'], 
            ['post_id'=>'1','user_id'=>'9','comment'=>'She had come to the conclusion that you could tell a lot about a person by their ears'],  
            ['post_id'=>'10','user_id'=>'5','comment'=>'The bush began to shake. Brad couldn\'t see what was causing it to shake'], 
            ['post_id'=>'9','user_id'=>'6','comment'=>'The things out there that are unknown aren\'t scary in themselves'],
            ['post_id'=>'8','user_id'=>'7','comment'=>'They are just unknown at the moment'],
            ['post_id'=>'7','user_id'=>'8','comment'=>'The box sat on the desk next to the computer'],
            ['post_id'=>'6','user_id'=>'9','comment'=>'It was always the Monday mornings. It never seemed to happen on Tuesday morning'], 
            ['post_id'=>'5','user_id'=>'10','comment'=>'He ordered his regular breakfast. Two eggs sunnyside up'], 
            ['post_id'=>'1','user_id'=>'10','comment'=>'The alarm went off at exactly 6:00 AM as it had every morning for the past five years'],  
        ];
           DB::table('comments')->insert($items);      
    
    }
}
