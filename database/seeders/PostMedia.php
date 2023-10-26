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

       $items = [
        ['post_id'=>'1','assigned_for'=>'gallery','file'=>'uploads/posts/p1-g1.jpg'],
        ['post_id'=>'1','assigned_for'=>'gallery','file'=>'uploads/posts/p1-g2.jpg'],
        ['post_id'=>'1','assigned_for'=>'gallery','file'=>'uploads/posts/p1-g3.jpg'],
        ['post_id'=>'1','assigned_for'=>'gallery','file'=>'uploads/posts/p1-g4.jpg'],
        ['post_id'=>'2','assigned_for'=>'gallery','file'=>'uploads/posts/p2-g1.jpg'],
        ['post_id'=>'2','assigned_for'=>'gallery','file'=>'uploads/posts/p2-g2.jpg'],
        ['post_id'=>'2','assigned_for'=>'gallery','file'=>'uploads/posts/p2-g3.jpg'],
        ['post_id'=>'3','assigned_for'=>'gallery','file'=>'uploads/posts/p3-g1.jpg'],
        ['post_id'=>'3','assigned_for'=>'gallery','file'=>'uploads/posts/p3-g2.jpg'],  
       ];
       DB::table('post_media')->insert($items);    

    }
}
