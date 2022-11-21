<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $items = [
        ['published'=>'1','image'=>'uploads/clients/adidas.png'],
        ['published'=>'1','image'=>'uploads/clients/nike.png'],
        ['published'=>'1','image'=>'uploads/clients/kappa.png'],
        ['published'=>'1','image'=>'uploads/clients/prada.png'],
        ['published'=>'1','image'=>'uploads/clients/hermes.png'],
        
       ];
       DB::table('clients')->insert($items);      

       $translated_items = [


            ['title'=>'Adidas','slug'=>'adidas','lang'=>'en','client_id'=>'1'],
            ['title'=>'أديداس','slug'=>'أديداس','lang'=>'ar','client_id'=>'1'],


            ['title'=>'Nike','slug'=>'nike','lang'=>'en','client_id'=>'2'],
            ['title'=>'نايك','slug'=>'نايك','lang'=>'ar','client_id'=>'2'],

            ['title'=>'Kappa','slug'=>'kappa','lang'=>'en','client_id'=>'3'],
            ['title'=>'كابا','slug'=>'كابا','lang'=>'ar','client_id'=>'3'],      


            ['title'=>'Prada','slug'=>'prada','lang'=>'en','client_id'=>'4'],
            ['title'=>'برادا ','slug'=>'برادا ','lang'=>'ar','client_id'=>'4'],      


            ['title'=>'Hermes','slug'=>'hermes','lang'=>'en','client_id'=>'5'],
            ['title'=>'هيرميس','slug'=>'هيرميس','lang'=>'ar','client_id'=>'5'],

       ];
       DB::table('client_translations')->insert($translated_items);  

    }
}
