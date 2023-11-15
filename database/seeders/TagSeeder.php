<?php
namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::table('tag_translations')->delete();

        //1
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Protection', 'slug' => 'protection', 'description' => 'Protection', 'lang' => 'en', 'tag_id' => $id], ['title' => 'الحمايه', 'slug' => 'الحمايه', 'description' => 'الحمايه', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //2
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Data', 'slug' => 'data', 'description' => 'Data', 'lang' => 'en', 'tag_id' => $id], ['title' => 'البيانات', 'slug' => 'البيانات', 'description' => 'البيانات', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //3
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Budget', 'slug' => 'budget', 'description' => 'Budget', 'lang' => 'en', 'tag_id' => $id], ['title' => 'الميزانيه', 'slug' => 'الميزانيه', 'description' => 'الميزانيه', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //4
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Shipping', 'slug' => 'shipping', 'description' => 'Shipping', 'lang' => 'en', 'tag_id' => $id], ['title' => 'الشحن', 'slug' => 'الشحن', 'description' => 'الشحن', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //5
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Delivery', 'slug' => 'delivery', 'description' => 'Delivery', 'lang' => 'en', 'tag_id' => $id], ['title' => 'التوصيل', 'slug' => 'التوصيل', 'description' => 'التوصيل', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //6
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Science', 'slug' => 'science', 'description' => 'Science', 'lang' => 'en', 'tag_id' => $id], ['title' => 'العلوم', 'slug' => 'العلوم', 'description' => 'العلوم', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //7
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Fashion', 'slug' => 'Fashion', 'description' => 'Fashion', 'lang' => 'en', 'tag_id' => $id], ['title' => 'الموضه', 'slug' => 'الموضه', 'description' => 'الموضه', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);
        //8
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Health', 'slug' => 'health', 'description' => 'Health', 'lang' => 'en', 'tag_id' => $id], ['title' => 'صحه', 'slug' => 'صحه', 'description' => 'صحه', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //9
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Accessories', 'slug' => 'accessories', 'description' => 'Accessories', 'lang' => 'en', 'tag_id' => $id], ['title' => 'أكسسوارات', 'slug' => 'أكسسوارات', 'description' => 'أكسسوارات', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);

        //10
        $id = DB::table('tags')->insertGetId([
            'id' => NULL,
        ]);
        $translated_items = [['title' => 'Technologies', 'slug' => 'technologies', 'description' => 'Technologies', 'lang' => 'en', 'tag_id' => $id], ['title' => 'التكنولوجيا', 'slug' => 'التكنولوجيا', 'description' => 'التكنولوجيا', 'lang' => 'ar', 'tag_id' => $id]];
        DB::table('tag_translations')->insert($translated_items);
    }
}
