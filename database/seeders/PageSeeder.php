<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

 

        DB::table('pages')->delete();
        DB::table('page_translations')->delete();

        

       $items = [
        ['status'=>'1'],
        ['status'=>'1'],
        ['status'=>'0'],
        ['status'=>'1'],
        ['status'=>'0'],
        ['status'=>'0']
       ];
       DB::table('pages')->insert($items);      

       $translated_items = [


            ['title'=>'About Us','slug'=>'about-us','lang'=>'en','page_id'=>'1'],
            ['title'=>'نبذه عن الشركه','slug'=>'نبذه-عن-الشركه','lang'=>'ar','page_id'=>'1'],


            ['title'=>'Services','slug'=>'services','lang'=>'en','page_id'=>'2'],
            ['title'=>'الخدمات','slug'=>'الخدمات','lang'=>'ar','page_id'=>'2'],

            ['title'=>'Contact Us','slug'=>'contact-us','lang'=>'en','page_id'=>'3'],
            ['title'=>'أتصل بنا','slug'=>'أتصل-بنا','lang'=>'ar','page_id'=>'3'],      


            ['title'=>'Blog','slug'=>'blog','lang'=>'en','page_id'=>'4'],
            ['title'=>'المدونه ','slug'=>'المدونه ','lang'=>'ar','page_id'=>'4'],      


            ['title'=>'Clients','slug'=>'clients','lang'=>'en','page_id'=>'5'],
            ['title'=>'العملاء','slug'=>'العملاء','lang'=>'ar','page_id'=>'5'],

            ['title'=>'Products','slug'=>'products','lang'=>'en','page_id'=>'6'],
            ['title'=>'المنتجات','slug'=>'المنتجات','lang'=>'ar','page_id'=>'6'],
       ];
       DB::table('page_translations')->insert($translated_items);  

    }
}
