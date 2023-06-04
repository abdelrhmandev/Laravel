<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['image'=>'uploads/post_categories/it.jpg','published'=>'1'],
        ['image'=>'uploads/post_categories/programing.jpg','published'=>'1'],
        ['image'=>'uploads/post_categories/design.jpg','published'=>'0'],
        ['image'=>'uploads/post_categories/social-net-work.jpg','published'=>'0'],
        ['image'=>'uploads/post_categories/security.jpg','published'=>'0'],
  
       ];
       DB::table('post_categories')->insert($items);      
       
       

       $translated_items = [

            ['title'=>'IT','slug'=>'it','lang'=>'en','post_category_id'=>1],
            ['title'=>'نظم المعلومات','slug'=>'نظم-المعلومات','lang'=>'ar','post_category_id'=>1],

            ['title'=>'Programing','slug'=>'programing','lang'=>'en','post_category_id'=>2],
            ['title'=>'البرمجه','slug'=>'البرمجه','lang'=>'ar','post_category_id'=>2],

            ['title'=>'Design','slug'=>'design','lang'=>'en','post_category_id'=>3],
            ['title'=>'التصميم','slug'=>'التصميم','lang'=>'ar','post_category_id'=>3],

            ['title'=>'Social Net Work','slug'=>'social-net-work','lang'=>'en','post_category_id'=>4],
            ['title'=>'شبكات التواصل الأجتماعي','slug'=>'شبكات-التواصل-الأجتماعي','lang'=>'ar','post_category_id'=>4],

            ['title'=>'Security','slug'=>'security','lang'=>'en','post_category_id'=>5],
            ['title'=>'امن المعلومات','slug'=>'امن-المعلومات','lang'=>'ar','post_category_id'=>5],  
            
       ];
       DB::table('post_categories_translations')->insert($translated_items);  

    }
}
