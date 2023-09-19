<?php
namespace Database\Seeders;
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

 
        
        $items = [

            // Posts Tags
            ['taxonomy'=>'posts'],
            ['taxonomy'=>'posts'],
            ['taxonomy'=>'posts'],
            ['taxonomy'=>'posts'],
            ['taxonomy'=>'posts'],        
            
            // Ecommerce Tags
            ['taxonomy'=>'products'],
            ['taxonomy'=>'products'],
            ['taxonomy'=>'products'],
            ['taxonomy'=>'products'],
            ['taxonomy'=>'products'],        

            // Recipes Tags      
            ['taxonomy'=>'recipes'],
            ['taxonomy'=>'recipes'],
            ['taxonomy'=>'recipes'],
            ['taxonomy'=>'recipes'],
            ['taxonomy'=>'recipes'],        
        ];

       DB::table('tags')->insert($items);      

       $translated_items = [




               // Posts Tags
               ['title'=>'Protection','description'=>'Protection','slug'=>'protection','lang'=>'en','tag_id'=>1],
               ['title'=>'الحمايه','description'=>'الحمايه','slug'=>'الحمايه','lang'=>'ar','tag_id'=>1],
       
       
               ['title'=>'Hacking','description'=>'Hacking','slug'=>'hacking','lang'=>'en','tag_id'=>2],
               ['title'=>'الأختراق','description'=>'الأختراق','slug'=>'الأختراق','lang'=>'ar','tag_id'=>2],
       
               ['title'=>'Servers','description'=>'Servers','slug'=>'servers','lang'=>'en','tag_id'=>3],
               ['title'=>'خوادم','description'=>'خوادم','slug'=>'خوادم','lang'=>'ar','tag_id'=>3],      
       
       
               ['title'=>'Data','description'=>'Data','slug'=>'data','lang'=>'en','tag_id'=>4],
               ['title'=>'البيانات','description'=>'البيانات','slug'=>'البيانات','lang'=>'ar','tag_id'=>4],      
       
       
               ['title'=>'NetWork','description'=>'NetWork','slug'=>'network','lang'=>'en','tag_id'=>5],
               ['title'=>'الشبكات','description'=>'الشبكات','slug'=>'الشبكات','lang'=>'ar','tag_id'=>5],


               
                // Products Tags
                ['title'=>'Fashion','description'=>'Fashion','slug'=>'fashion','lang'=>'en','tag_id'=>6],
                ['title'=>'الموضه','description'=>'الموضه','slug'=>'الموضه','lang'=>'ar','tag_id'=>6],
        
        
                ['title'=>'Budget','description'=>'Budget','slug'=>'budget','lang'=>'en','tag_id'=>7],
                ['title'=>'الميزانيه','description'=>'الميزانيه','slug'=>'الميزانيه','lang'=>'ar','tag_id'=>7],
        
                ['title'=>'PayPal','description'=>'PayPal','slug'=>'paypal','lang'=>'en','tag_id'=>8],
                ['title'=>'باي بال','description'=>'باي بال','slug'=>'باي-بال','lang'=>'ar','tag_id'=>8],      
        
        
                ['title'=>'Shipping','description'=>'Shipping','slug'=>'shipping','lang'=>'en','tag_id'=>9],
                ['title'=>'الشحن','description'=>'الشحن','slug'=>'الشحن','lang'=>'ar','tag_id'=>9],      
        
        
                ['title'=>'Delivery','description'=>'Delivery','slug'=>'delivery','lang'=>'en','tag_id'=>10],
                ['title'=>'التوصيل','description'=>'التوصيل','slug'=>'التوصيل','lang'=>'ar','tag_id'=>10],



       // Recipes Tags
        ['title'=>'Healthy Food','description'=>'Healthy Food','slug'=>'healthy-food','lang'=>'en','tag_id'=>11],
        ['title'=>'طعام صحي','description'=>'طعام صحي','slug'=>'طعام-صحي','lang'=>'ar','tag_id'=>11],


        ['title'=>'Dessert','description'=>'Dessert','slug'=>'dessert','lang'=>'en','tag_id'=>12],
        ['title'=>'حلوى','description'=>'حلوى','slug'=>'حلوى','lang'=>'ar','tag_id'=>12],

        ['title'=>'Chicken Wings','description'=>'Chicken Wings','slug'=>'chicken-wings','lang'=>'en','tag_id'=>13],
        ['title'=>'أجنحه دجاج','description'=>'أجنحه دجاج','slug'=>'أجنحه-دجاج','lang'=>'ar','tag_id'=>13],      


        ['title'=>'Rice','description'=>'Rice','slug'=>'rice','lang'=>'en','tag_id'=>14],
        ['title'=>'أرز','description'=>'أرز','slug'=>'أرز','lang'=>'ar','tag_id'=>14],      


        ['title'=>'Beef','description'=>'Beef','slug'=>'beef','lang'=>'en','tag_id'=>15],
        ['title'=>'لحم بيف','description'=>'لحم بيف','slug'=>'لحم-بيف','lang'=>'ar','tag_id'=>15],



 

       ];
       DB::table('tag_translations')->insert($translated_items);  

    }
}
