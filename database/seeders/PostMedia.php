<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostMedia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('post_media')->delete();

        for ($i=0; $i < 20; $i++) { 
            $items = [
                ['post_id'=>'1','assigned_for'=>'gallery','file'=>'uploads/posts/p1-g1.jpg'],
               ];
               DB::table('post_media')->insert($items);    
        
        }

    }
}
