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
               ['title'=>'Protection','slug'=>'protection','lang'=>'en','tag_id'=>1],
               ['title'=>'الحمايه','slug'=>'الحمايه','lang'=>'ar','tag_id'=>1],
       
       
               ['title'=>'Hacking','slug'=>'hacking','lang'=>'en','tag_id'=>2],
               ['title'=>'الأختراق','slug'=>'الأختراق','lang'=>'ar','tag_id'=>2],
       
               ['title'=>'Servers','slug'=>'servers','lang'=>'en','tag_id'=>3],
               ['title'=>'خوادم','slug'=>'خوادم','lang'=>'ar','tag_id'=>3],      
       
       
               ['title'=>'Data','slug'=>'data','lang'=>'en','tag_id'=>4],
               ['title'=>'البيانات','slug'=>'البيانات','lang'=>'ar','tag_id'=>4],      
       
       
               ['title'=>'NetWork','slug'=>'network','lang'=>'en','tag_id'=>5],
               ['title'=>'الشبكات','slug'=>'الشبكات','lang'=>'ar','tag_id'=>5],


               
                // Products Tags
                ['title'=>'Fashion','slug'=>'fashion','lang'=>'en','tag_id'=>6],
                ['title'=>'الموضه','slug'=>'الموضه','lang'=>'ar','tag_id'=>6],
        
        
                ['title'=>'Budget','slug'=>'budget','lang'=>'en','tag_id'=>7],
                ['title'=>'الميزانيه','slug'=>'الميزانيه','lang'=>'ar','tag_id'=>7],
        
                ['title'=>'PayPal','slug'=>'paypal','lang'=>'en','tag_id'=>8],
                ['title'=>'باي بال','slug'=>'باي-بال','lang'=>'ar','tag_id'=>8],      
        
        
                ['title'=>'Shipping','slug'=>'shipping','lang'=>'en','tag_id'=>9],
                ['title'=>'الشحن','slug'=>'الشحن','lang'=>'ar','tag_id'=>9],      
        
        
                ['title'=>'Delivery','slug'=>'delivery','lang'=>'en','tag_id'=>10],
                ['title'=>'التوصيل','slug'=>'التوصيل','lang'=>'ar','tag_id'=>10],



       // Recipes Tags
        // ['title'=>'Healthy Food','slug'=>'healthy-food','lang'=>'en','tag_id'=>11],
        // ['title'=>'طعام صحي','slug'=>'طعام-صحي','lang'=>'ar','tag_id'=>11],


        // ['title'=>'Dessert','slug'=>'dessert','lang'=>'en','tag_id'=>12],
        // ['title'=>'حلوى','slug'=>'حلوى','lang'=>'ar','tag_id'=>12],

        // ['title'=>'Chicken Wings','slug'=>'chicken-wings','lang'=>'en','tag_id'=>13],
        // ['title'=>'أجنحه دجاج','slug'=>'أجنحه-دجاج','lang'=>'ar','tag_id'=>13],      


        // ['title'=>'Rice','slug'=>'rice','lang'=>'en','tag_id'=>14],
        // ['title'=>'أرز','slug'=>'أرز','lang'=>'ar','tag_id'=>14],      


        // ['title'=>'Beef','slug'=>'beef','lang'=>'en','tag_id'=>15],
        // ['title'=>'لحم بيف','slug'=>'لحم-بيف','lang'=>'ar','tag_id'=>15],



 

       ];
       DB::table('tag_translation')->insert($translated_items);  

    }
}
