<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;

class PostSeeder extends Seeder
{

    // https://etharshrouf.com/article/53/%D8%A5%D8%B3%D8%AA%D8%AE%D8%AF%D8%A7%D9%85-seeder-%D9%88-factory-%D9%81%D9%8A-%D8%AA%D9%88%D9%84%D9%8A%D8%AF-%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA-%D8%B9%D8%B4%D9%88%D8%A7%D8%A6%D9%8A%D8%A9-%D9%81%D9%8A-%D9%84%D8%A7%D8%B1%D8%A7%D9%81%D9%8A%D9%84%D8%8C-%D9%88%D9%83%D9%8A%D9%81%D9%8A%D8%A9-%D8%A5%D8%AF%D8%AE%D8%A7%D9%84-%D8%A7%D9%84%D8%A8%D9%8A%D8%A7%D9%86%D8%A7%D8%AA-%D8%A8%D8%A7%D9%84%D9%84%D8%BA%D8%A9-%D8%A7%D9%84%D8%B9%D8%B1%D8%A8%D9%8A%D8%A9
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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


           $fakerEn = Faker::create('en_GB');

           $fakerAr = Faker::create('ar_SA');

         
           
           for($i=1;$i<=10;$i++){


 
 





                $translated_items = [        
                    ['title'=>$fakerEn->sentence(8),'slug'=>$fakerEn->slug(),'description'=>$fakerEn->paragraph(8),'lang'=>'en','post_id'=>$i],
                    ['title'=>$fakerAr->realText(30,true),'slug'=>str_replace(' ', '-',$fakerAr->realText(30, true)),'description'=>$fakerAr->realText(20, true),'lang'=>'ar','post_id'=>$i],
                ];
                     DB::table('post_translations')->insert($translated_items);     
             }  

    }
}
