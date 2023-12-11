<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $items = [
            ['status'=>'1','image'=>'uploads/posts/1.jpg','user_id'=>'1','featured'=>'1','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(10)],
            ['status'=>'1','image'=>'uploads/posts/2.jpg','user_id'=>'2','featured'=>'1','allow_comments'=>'0','created_at'=>Carbon::now()->subDays(11)],
            ['status'=>'0','image'=>'uploads/posts/3.jpg','user_id'=>'2','featured'=>'0','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(12)],
            ['status'=>'1','image'=>'uploads/posts/4.jpg','user_id'=>'7','featured'=>'1','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(13)],
            ['status'=>'0','image'=>'uploads/posts/5.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'0','created_at'=>Carbon::now()->subDays(14)],
            ['status'=>'1','image'=>'uploads/posts/6.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(15)],
            ['status'=>'0','image'=>'uploads/posts/7.jpg','user_id'=>'8','featured'=>'0','allow_comments'=>'0','created_at'=>Carbon::now()->subDays(16)],
            ['status'=>'1','image'=>'uploads/posts/8.jpg','user_id'=>'4','featured'=>'1','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(17)],
            ['status'=>'0','image'=>'uploads/posts/9.jpg','user_id'=>'5','featured'=>'1','allow_comments'=>'1','created_at'=>Carbon::now()->subDays(18)],
            ['status'=>'1','image'=>'uploads/posts/10.jpg','user_id'=>'1','featured'=>'0','allow_comments'=>'0','created_at'=>Carbon::now()->subDays(19)],
           ];
           DB::table('posts')->insert($items);      
    
           for($i=1;$i<=10;$i++){
                $translated_items = [        
                        ['title'=>$faker->words(10, true),'slug'=>$faker->unique()->slug,'description'=>$faker->sentence(45),'lang'=>'en','post_id'=>$i],
                    ];
                DB::table('post_translations')->insert($translated_items);     
             }  
    }
}

