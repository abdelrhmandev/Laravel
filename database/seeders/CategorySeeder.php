<?php
namespace Database\Seeders;
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


       $items = [
        ['image'=>'uploads/categories/it.jpg','status'=>'1'],
        ['image'=>'uploads/categories/programing.jpg','status'=>'1'],
        ['image'=>'uploads/categories/design.jpg','status'=>'0'],
        ['image'=>'uploads/categories/social-net-work.jpg','status'=>'0'],
        ['image'=>'uploads/categories/security.jpg','status'=>'0'],
  
       ];
       DB::table('categories')->insert($items);      
       
       

       $translated_items = [

            ['title'=>'IT','slug'=>'it','lang'=>'en','category_id'=>1],
            ['title'=>'نظم المعلومات','slug'=>'نظم-المعلومات','lang'=>'ar','category_id'=>1],

            ['title'=>'Programing','slug'=>'programing','lang'=>'en','category_id'=>2],
            ['title'=>'البرمجه','slug'=>'البرمجه','lang'=>'ar','category_id'=>2],

            ['title'=>'Design','slug'=>'design','lang'=>'en','category_id'=>3],
            ['title'=>'التصميم','slug'=>'التصميم','lang'=>'ar','category_id'=>3],

            ['title'=>'Social Net Work','slug'=>'social-net-work','lang'=>'en','category_id'=>4],
            ['title'=>'شبكات التواصل الأجتماعي','slug'=>'شبكات-التواصل-الأجتماعي','lang'=>'ar','category_id'=>4],

            ['title'=>'Security','slug'=>'security','lang'=>'en','category_id'=>5],
            ['title'=>'امن المعلومات','slug'=>'امن-المعلومات','lang'=>'ar','category_id'=>5],  
            
       ];
       DB::table('category_translation')->insert($translated_items);  

    }
}
