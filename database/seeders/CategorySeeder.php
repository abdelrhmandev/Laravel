<?php
namespace Database\Seeders;
use App\Models\Category;
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
   
        $TransTbl = 'category_translation';
       


        ////////////POSTS////
        $Taxonomy  = 'posts';
        ///1
        $id = DB::table('categories')->insertGetId([
            'image'     => 'uploads/categories/it.jpg',
            'status'    => '1',
            'taxonomy'  => $Taxonomy
         ]);
        $translated_items = [
            ['title'=>'IT','slug'=>'it','description'=>'IT','lang'=>'en','category_id'=>$id],
            ['title'=>'نظم المعلومات','slug'=>'نظم-المعلومات','description'=>'نظم المعلومات','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);  

        //2
        $id = DB::table('categories')->insertGetId([
            'image'     => 'uploads/categories/programing.jpg',
            'status'    => '1',
            'taxonomy'  => $Taxonomy
         ]);
        $translated_items = [
            ['title'=>'Programing','slug'=>'programing','description'=>'Programing','lang'=>'en','category_id'=>2],
            ['title'=>'البرمجه','slug'=>'البرمجه','description'=>'البرمجه','lang'=>'ar','category_id'=>2],
        ];
        DB::table($TransTbl)->insert($translated_items);  

       //3 
        $id = DB::table('categories')->insertGetId([
            'image'     => 'uploads/categories/design.jpg',
            'status'    => '1',
            'taxonomy'  => $Taxonomy
         ]);
        $translated_items = [
            ['title'=>'Design','slug'=>'design','description'=>'Design','lang'=>'en','category_id'=>3],
            ['title'=>'التصميم','slug'=>'التصميم','description'=>'التصميم','lang'=>'ar','category_id'=>3],
        ];
        DB::table($TransTbl)->insert($translated_items);  

        //4
        $id = DB::table('categories')->insertGetId([
            'image'     => 'uploads/categories/social-net-work.jpg',
            'status'    => '1',
            'taxonomy'  => $Taxonomy
         ]);
        $translated_items = [
            ['title'=>'Social Net Work','slug'=>'social-net-work','description'=>'Social Net Work','lang'=>'en','category_id'=>4],
            ['title'=>'شبكات التواصل الأجتماعي','slug'=>'شبكات-التواصل-الأجتماعي','description'=>'شبكات التواصل الأجتماعي','lang'=>'ar','category_id'=>4],
        ];
        DB::table($TransTbl)->insert($translated_items);  

        //5        
        $id = DB::table('categories')->insertGetId([
            'image'     => 'uploads/categories/security.jpg',
            'status'    => '1',
            'taxonomy'  => $Taxonomy
         ]);
        $translated_items = [
            ['title'=>'Security','slug'=>'security','description'=>'Security','lang'=>'en','category_id'=>5],
            ['title'=>'امن المعلومات','slug'=>'امن-المعلومات','description'=>'امن المعلومات','lang'=>'ar','category_id'=>5],  
        ];
        DB::table($TransTbl)->insert($translated_items);  


    ////////////PRODUCTS//// 
    $Taxonomy  = 'products';

    ///1
    $id = DB::table('categories')->insertGetId([
        'image'     => 'uploads/ecommerce/categories/computers.png',
        'status'    => '1',
        'taxonomy'  => $Taxonomy
     ]);
    $translated_items = [
        ['title'=>'Computers','slug'=>'computers','description'=>'Computers','lang'=>'en','category_id'=>$id],
        ['title'=>'كمبيوتر','slug'=>'كمبيوتر','description'=>'كمبيوتر','lang'=>'ar','category_id'=>$id],
    ];
    DB::table($TransTbl)->insert($translated_items);  

    //2
    $id = DB::table('categories')->insertGetId([
        'image'     => 'uploads/ecommerce/categories/watches.png',
        'status'    => '1',
        'taxonomy'  => $Taxonomy
     ]);
    $translated_items = [
        ['title'=>'Watches','slug'=>'watches','description'=>'Watches','lang'=>'en','category_id'=>$id],
        ['title'=>'ساعات','slug'=>'ساعات','description'=>'ساعات','lang'=>'ar','category_id'=>$id],
    ];
    DB::table($TransTbl)->insert($translated_items);  

   //3 
    $id = DB::table('categories')->insertGetId([
        'image'     => 'uploads/ecommerce/categories/headphones.png',
        'status'    => '1',
        'taxonomy'  => $Taxonomy
     ]);
    $translated_items = [
        ['title'=>'HeadPhones','slug'=>'head-phones','description'=>'HeadPhones','lang'=>'en','category_id'=>$id],
        ['title'=>'سماعات رأس','slug'=>'سماعات-رأس','description'=>'سماعات رأس','lang'=>'ar','category_id'=>$id],
    ];
    DB::table($TransTbl)->insert($translated_items);  

    //4
    $id = DB::table('categories')->insertGetId([
        'image'     => 'uploads/ecommerce/categories/t-shirts.png',
        'status'    => '1',
        'taxonomy'  => $Taxonomy
     ]);
    $translated_items = [
        ['title'=>'Shirts','slug'=>'shirts','description'=>'Shirts','lang'=>'en','category_id'=>$id],
        ['title'=>'تيشرت','slug'=>'تيشرت','description'=>'تيشرت','lang'=>'ar','category_id'=>$id],
    ];
    DB::table($TransTbl)->insert($translated_items);  

    //5        
    $id = DB::table('categories')->insertGetId([
        'image'     => 'uploads/ecommerce/categories/handbags.png',
        'status'    => '1',
        'taxonomy'  => $Taxonomy
     ]);
    $translated_items = [
        ['title'=>'HandBags','slug'=>'hand-bags','description'=>'HandBags','lang'=>'en','category_id'=>$id],
        ['title'=>'حقائب يد','slug'=>'حقائب يد','description'=>'حقائب يد','lang'=>'ar','category_id'=>$id],  
    ];
    DB::table($TransTbl)->insert($translated_items);  

        ////////////Recipes////
        $Taxonomy = 'recipes';

        ///1
        $id = DB::table('categories')->insertGetId([
        'image' => 'uploads/fooding/categories/snack.jpg',
        'status' => '1',
        'taxonomy' => $Taxonomy
        ]);
        $translated_items = [
        ['title'=>'Snacks','slug'=>'Snacks','description'=>'Snacks','lang'=>'en','category_id'=>$id],
        ['title'=>'وجبات خفيفة','slug'=>'وجبات-خفيفة','description'=>'وجبات خفيفة','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);
    
        //2
        $id = DB::table('categories')->insertGetId([
        'image' => 'uploads/ecommerce/categories/soup.jpg',
        'status' => '1',
        'taxonomy' => $Taxonomy
        ]);
        $translated_items = [
        ['title'=>'Soups','slug'=>'soups','description'=>'Soups','lang'=>'en','category_id'=>$id],
        ['title'=>'شوربه','slug'=>'شوربه','description'=>'شوربه ','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);
    
        //3
        $id = DB::table('categories')->insertGetId([
        'image' => 'uploads/ecommerce/categories/chicken.jpg',
        'status' => '1',
        'taxonomy' => $Taxonomy
        ]);
        $translated_items = [
        ['title'=>'Chicken','slug'=>'chicken','description'=>'Chicken Chicken','lang'=>'en','category_id'=>$id],
        ['title'=>'دجاج','slug'=>'دجاج','description'=>'دجاج','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);
    
        //4
        $id = DB::table('categories')->insertGetId([
        'image' => 'uploads/ecommerce/categories/beef.jpg',
        'status' => '1',
        'taxonomy' => $Taxonomy
        ]);
        $translated_items = [
        ['title'=>'Beef','slug'=>'beef','description'=>'Beef Beef ','lang'=>'en','category_id'=>$id],
        ['title'=>'لحم بقري','slug'=>'لحم-بقري','description'=> 'لحم بقري','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);
    
        //5
        $id = DB::table('categories')->insertGetId([
        'image' => 'uploads/ecommerce/categories/pasta.jpg',
        'status' => '1',
        'taxonomy' => $Taxonomy
        ]);
        $translated_items = [
        ['title'=>'Pasta','slug'=>'pasta','description'=>'Pasta ','lang'=>'en','category_id'=>$id],
        ['title'=>'مكرونه','slug'=>'مكرونه','description'=>'مكرونه','lang'=>'ar','category_id'=>$id],
        ];
        DB::table($TransTbl)->insert($translated_items);
    







    }
 
}
