<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('brands')->delete();
        DB::table('brand_translations')->delete();


 

       $items = [
        ['published'=>'1','image'=>'uploads/brands/adidas.png'],
        ['published'=>'1','image'=>'uploads/brands/nike.png'],
        ['published'=>'0','image'=>'uploads/brands/kappa.png'],
        ['published'=>'1','image'=>'uploads/brands/prada.png'],
        ['published'=>'0','image'=>'uploads/brands/hermes.png'],
        ['published'=>'0','image'=>NULL],
        ['published'=>'1','image'=>NULL],
       ];
       DB::table('brands')->insert($items);      

       $translated_items = [


            ['title'=>'Adidas','slug'=>'adidas','lang'=>'en','brand_id'=>'1'],
            ['title'=>'أديداس','slug'=>'أديداس','lang'=>'ar','brand_id'=>'1'],


            ['title'=>'Nike','slug'=>'nike','lang'=>'en','brand_id'=>'2'],
            ['title'=>'نايك','slug'=>'نايك','lang'=>'ar','brand_id'=>'2'],

            ['title'=>'Kappa','slug'=>'kappa','lang'=>'en','brand_id'=>'3'],
            ['title'=>'كابا','slug'=>'كابا','lang'=>'ar','brand_id'=>'3'],      


            ['title'=>'Prada','slug'=>'prada','lang'=>'en','brand_id'=>'4'],
            ['title'=>'برادا ','slug'=>'برادا ','lang'=>'ar','brand_id'=>'4'],      


            ['title'=>'Hermes','slug'=>'hermes','lang'=>'en','brand_id'=>'5'],
            ['title'=>'هيرميس','slug'=>'هيرميس','lang'=>'ar','brand_id'=>'5'],

            ['title'=>'H&M','slug'=>'h-m','lang'=>'en','brand_id'=>'6'],
            ['title'=>'اتش اند ام','slug'=>'اتش-اند-ام','lang'=>'ar','brand_id'=>'6'],

            ['title'=>'C&CO','slug'=>'c-co','lang'=>'en','brand_id'=>'7'],
            ['title'=>'سى اند كو','slug'=>'سى-اند-كو','lang'=>'ar','brand_id'=>'7'],
       ];
       DB::table('brand_translations')->insert($translated_items);  

    }
}
