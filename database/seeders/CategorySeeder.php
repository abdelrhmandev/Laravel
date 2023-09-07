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
             // Posts Categories
            ['image'=>'uploads/categories/it.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/programing.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/design.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/social-net-work.jpg','status'=>'1','taxonomy'=>'posts'],
            ['image'=>'uploads/categories/security.jpg','status'=>'1','taxonomy'=>'posts'],  
 
            // Ecommerce Categories
            ['image'=>'uploads/ecommerce/categories/computers.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/watches.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/headphones.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/t-shirts.png','status'=>'1','taxonomy'=>'products'],
            ['image'=>'uploads/ecommerce/categories/handbags.png','status'=>'1','taxonomy'=>'products'],  

            // Recipes Categories
            ['image'=>'uploads/fooding/categories/snack.jpg','status'=>'1','taxonomy'=>'recipes'],
            ['image'=>'uploads/fooding/categories/soup.jpg','status'=>'1','taxonomy'=>'recipes'],
            ['image'=>'uploads/fooding/categories/chicken.jpg','status'=>'1','taxonomy'=>'recipes'],
            ['image'=>'uploads/fooding/categories/beef.jpg','status'=>'1','taxonomy'=>'recipes'],
            ['image'=>'uploads/fooding/categories/pasta.jpg','status'=>'1','taxonomy'=>'recipes'],  


        ];


       DB::table('categories')->insert($items);      
       
       

       $translated_items = [
            // Posts Categories
            ['title'=>'IT','slug'=>'it','description'=>'IT','lang'=>'en','category_id'=>1],
            ['title'=>'نظم المعلومات','slug'=>'نظم-المعلومات','description'=>'نظم المعلومات','lang'=>'ar','category_id'=>1],

            ['title'=>'Programing','slug'=>'programing','description'=>'Programing','lang'=>'en','category_id'=>2],
            ['title'=>'البرمجه','slug'=>'البرمجه','description'=>'البرمجه','lang'=>'ar','category_id'=>2],

            ['title'=>'Design','slug'=>'design','description'=>'Design','lang'=>'en','category_id'=>3],
            ['title'=>'التصميم','slug'=>'التصميم','description'=>'التصميم','lang'=>'ar','category_id'=>3],

            ['title'=>'Social Net Work','slug'=>'social-net-work','description'=>'Social Net Work','lang'=>'en','category_id'=>4],
            ['title'=>'شبكات التواصل الأجتماعي','slug'=>'شبكات-التواصل-الأجتماعي','description'=>'شبكات التواصل الأجتماعي','lang'=>'ar','category_id'=>4],

            ['title'=>'Security','slug'=>'security','description'=>'Security','lang'=>'en','category_id'=>5],
            ['title'=>'امن المعلومات','slug'=>'امن-المعلومات','description'=>'امن المعلومات','lang'=>'ar','category_id'=>5],  
            

            // Products Categories
            ['title'=>'Computers','slug'=>'computers','description'=>'Computers','lang'=>'en','category_id'=>6],
            ['title'=>'كمبيوتر','slug'=>'كمبيوتر','description'=>'كمبيوتر','lang'=>'ar','category_id'=>6],

            ['title'=>'Watches','slug'=>'watches','description'=>'Watches','lang'=>'en','category_id'=>7],
            ['title'=>'ساعات','slug'=>'ساعات','description'=>'ساعات','lang'=>'ar','category_id'=>7],

            ['title'=>'HeadPhones','slug'=>'head-phones','description'=>'HeadPhones','lang'=>'en','category_id'=>8],
            ['title'=>'سماعات رأس','slug'=>'سماعات-رأس','description'=>'سماعات رأس','lang'=>'ar','category_id'=>8],

            ['title'=>'Shirts','slug'=>'shirts','description'=>'Shirts','lang'=>'en','category_id'=>9],
            ['title'=>'تيشرت','slug'=>'تيشرت','description'=>'تيشرت','lang'=>'ar','category_id'=>9],

            ['title'=>'HandBags','slug'=>'hand-bags','description'=>'HandBags','lang'=>'en','category_id'=>10],
            ['title'=>'حقيبه يد','slug'=>'حقيبه يد','description'=>'حقيبه يد','lang'=>'ar','category_id'=>10],  



            // Recipes Categories
            ['title'=>'Snacks','slug'=>'Snacks','description'=>'Snacks','lang'=>'en','category_id'=>11],
            ['title'=>'وجبات خفيفة','slug'=>'وجبات-خفيفة','description'=>'وجبات خفيفة','lang'=>'ar','category_id'=>11],    
    
            ['title'=>'Soups','slug'=>'blt-pasta','description'=>'Soups Soups ','lang'=>'en','category_id'=>12],
            ['title'=>'شوربه','slug'=>'شوربه','description'=>'شوربه ','lang'=>'ar','category_id'=>12],
    
            ['title'=>'Chicken','slug'=>'chicken','description'=>'Chicken Chicken','lang'=>'en','category_id'=>13],
            ['title'=>'دجاج','slug'=>'دجاج','description'=>'دجاج','lang'=>'ar','category_id'=>13],
    
            ['title'=>'Beef','slug'=>'beef','description'=>'Beef Beef ','lang'=>'en','category_id'=>14],
            ['title'=>'لحم بقري','slug'=>'لحم-بقري','description'=> 'لحم بقري','lang'=>'ar','category_id'=>14],
    
    
            ['title'=>'Pasta','slug'=>'pasta','description'=>'Pasta ','lang'=>'en','category_id'=>15],
            ['title'=>'مكرونه','slug'=>'مكرونه','description'=>'مكرونه','lang'=>'ar','category_id'=>15],

            


       ];
       DB::table('category_translation')->insert($translated_items);  

    }
}
