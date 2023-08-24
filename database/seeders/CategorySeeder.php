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
            ['image'=>'uploads/categories/it.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/programing.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/design.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/social-net-work.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/security.jpg','status'=>'1','taxonomy'=>'posts'],  
 
            ['image'=>'uploads/ecommerce/categories/computers.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/watches.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/headphones.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/t-shirts.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/handbags.png','status'=>'1','taxonomy'=>'products'],  
   ];


       DB::table('categories')->insert($items);      
       
       

       $translated_items = [
            // Posts Categories
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
            

            // Products Categories
            ['title'=>'Computers','slug'=>'computers','lang'=>'en','category_id'=>6],
            ['title'=>'كمبيوتر','slug'=>'كمبيوتر','lang'=>'ar','category_id'=>6],

            ['title'=>'Watches','slug'=>'watches','lang'=>'en','category_id'=>7],
            ['title'=>'ساعات','slug'=>'ساعات','lang'=>'ar','category_id'=>7],

            ['title'=>'HeadPhones','slug'=>'headphones','lang'=>'en','category_id'=>8],
            ['title'=>'سماعات رأس','slug'=>'سماعات-رأس','lang'=>'ar','category_id'=>8],

            ['title'=>'Shirts','slug'=>'shirts','lang'=>'en','category_id'=>9],
            ['title'=>'تيشرت','slug'=>'تيشرت','lang'=>'ar','category_id'=>9],

            ['title'=>'HandBags','slug'=>'handbags','lang'=>'en','category_id'=>10],
            ['title'=>'حقيبه يد','slug'=>'حقيبه يد','lang'=>'ar','category_id'=>10],  


       ];
       DB::table('category_translation')->insert($translated_items);  

    }
}
