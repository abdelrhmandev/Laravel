<?php
namespace Database\Seeders;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('category_translations')->delete();

        //1
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/sports.jpg',
            'created_at'=>Carbon::now()->subDays(10)
        ]);
        $translated_items = [['title' => 'Sports', 'slug' => 'sports', 'description' => 'Sports', 'lang' => 'en', 'category_id' => $id], ['title' => 'الرياضه', 'slug' => 'الرياضه', 'description' => 'الرياضه', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);


        #SUBS
        $id = DB::table('categories')->insertGetId([
            'image' => NULL,
            'parent_id'=>'1',
            'created_at'=>Carbon::now()->subDays(10)
        ]);
        $translated_items = [['title' => 'FootBall', 'slug' => 'football', 'description' => 'FootBall', 'lang' => 'en', 'category_id' => $id], ['title' => 'كرة القدم', 'slug' => 'كرة القدم', 'description' => 'كرة القدم', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);
        $id = DB::table('categories')->insertGetId([
            'image' => NULL,
            'parent_id'=>'1',
            'created_at'=>Carbon::now()->subDays(10)
        ]);
        $translated_items = [['title' => 'BasketBall', 'slug' => 'basketball', 'description' => 'BasketBall', 'lang' => 'en', 'category_id' => $id], ['title' => 'كرة السله', 'slug' => 'كرة السله', 'description' => 'كرة السله', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);
        /////////////

        //2
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/nature.jpg',            
            'created_at'=>Carbon::now()->subDays(9)
        ]);
        $translated_items = [['title' => 'Nature', 'slug' => 'nature', 'description' => 'Nature', 'lang' => 'en', 'category_id' => $id], ['title' => 'الطبيعه', 'slug' => 'الطبيعه', 'description' => 'الطبيعه', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //3
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/design.jpg',
            'created_at'=>Carbon::now()->subDays(8)
        ]);
        $translated_items = [['title' => 'Design', 'slug' => 'design', 'description' => 'Design', 'lang' => 'en', 'category_id' => $id], ['title' => 'التصميم', 'slug' => 'التصميم', 'description' => 'التصميم', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //4
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/education.jpg',            
            'created_at'=>Carbon::now()->subDays(7)
        ]);
        $translated_items = [['title' => 'Education', 'slug' => 'education', 'description' => 'Education', 'lang' => 'en', 'category_id' => $id], ['title' => 'التعليم', 'slug' => 'التعليم', 'description' => 'التعليم', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //5
        $id = DB::table('categories')->insertGetId([
            'image' => NULL,
            'created_at'=>Carbon::now()->subDays(6)
        ]);
        $translated_items = [['title' => 'Marketing', 'slug' => 'marketing', 'description' => 'Marketing', 'lang' => 'en', 'category_id' => $id], ['title' => 'التسويق', 'slug' => 'التسويق', 'description' => 'التسويق', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //6
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/history.jpg',            
            'created_at'=>Carbon::now()->subDays(5)
        ]);
        $translated_items = [['title' => 'History', 'slug' => 'history', 'description' => 'History', 'lang' => 'en', 'category_id' => $id], ['title' => 'التاريخ', 'slug' => 'التاريخ', 'description' => 'التاريخ', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //7
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/food.jpg',
            'created_at'=>Carbon::now()->subDays(6)
        ]);
        $translated_items = [['title' => 'Food', 'slug' => 'food', 'description' => 'Food', 'lang' => 'en', 'category_id' => $id], ['title' => 'طعام', 'slug' => 'طعام', 'description' => 'طعام', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);
        //8
        $id = DB::table('categories')->insertGetId([
            'image' => NULL,
            'created_at'=>Carbon::now()->subDays(6)
        ]);
        $translated_items = [['title' => 'Health', 'slug' => 'health', 'description' => 'Health', 'lang' => 'en', 'category_id' => $id], ['title' => 'صحه', 'slug' => 'صحه', 'description' => 'صحه', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //9
        $id = DB::table('categories')->insertGetId([
            'image' => 'uploads/categories/travel.jpg',
            'created_at'=>Carbon::now()->subDays(6)
        ]);
        $translated_items = [['title' => 'Travel', 'slug' => 'travel', 'description' => 'Travel', 'lang' => 'en', 'category_id' => $id], ['title' => 'السفر', 'slug' => 'السفر', 'description' => 'السفر', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);

        //10
        $id = DB::table('categories')->insertGetId([
            'image' => NULL,            
            'created_at'=>Carbon::now()->subDays(6)
        ]);
        $translated_items = [['title' => 'Industry', 'slug' => 'industry', 'description' => 'industry', 'lang' => 'en', 'category_id' => $id], ['title' => 'الصناعه', 'slug' => 'الصناعه', 'description' => 'الصناعه', 'lang' => 'ar', 'category_id' => $id]];
        DB::table('category_translations')->insert($translated_items);
    }
}
