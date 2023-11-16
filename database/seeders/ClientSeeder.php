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
        DB::table('clients')->delete();
        DB::table('client_translations')->delete();        
       $items = [
        ['link'=>'https://www.adidas.com/us','image'=>'uploads/clients/adidas.png'],
        ['link'=>'https://www.nike.com/eg/','image'=>'uploads/clients/nike.png'],
        ['link'=>'https://www.kappa.com/','image'=>'uploads/clients/kappa.png'],
        ['link'=>'https://www.prada.com/ww/en.html','image'=>'uploads/clients/prada.jpg'],
        ['link'=>'https://www.hp.com/us-en/home.html','image'=>'uploads/clients/hp.png'],
        ['link'=>'https://www2.deloitte.com/us/en.html','image'=>'uploads/clients/deloitte.jpg'],
        ['link'=>'https://www.nokia.com/','image'=>'uploads/clients/nokia.png'],
        ['link'=>'https://www.sony.com','image'=>'uploads/clients/sony.jpg'],
        ['link'=>'https://bluebus.com.eg/','image'=>'uploads/clients/bluebus.png'],
        ['link'=>'https://www.lamaregypt.com/en','image'=>'uploads/clients/lamar.png'],        
       ];
       DB::table('clients')->insert($items);      

       $translated_items = [


            ['title'=>'Adidas','lang'=>'en','client_id'=>'1'],
            ['title'=>'أديداس','lang'=>'ar','client_id'=>'1'],


            ['title'=>'Nike','lang'=>'en','client_id'=>'2'],
            ['title'=>'نايك','lang'=>'ar','client_id'=>'2'],

            ['title'=>'Kappa','lang'=>'en','client_id'=>'3'],
            ['title'=>'كابا','lang'=>'ar','client_id'=>'3'],      


            ['title'=>'Prada','lang'=>'en','client_id'=>'4'],
            ['title'=>'برادا ','lang'=>'ar','client_id'=>'4'],      


            ['title'=>'HP','lang'=>'en','client_id'=>'5'],
            ['title'=>'أتش بي','lang'=>'ar','client_id'=>'5'],

            ['title'=>'Deloitte','lang'=>'en','client_id'=>'6'],
            ['title'=>'ديلويتس','lang'=>'ar','client_id'=>'6'],

            ['title'=>'Nokia','lang'=>'en','client_id'=>'7'],
            ['title'=>'نوكيا','lang'=>'ar','client_id'=>'7'],

            ['title'=>'Sony','lang'=>'en','client_id'=>'8'],
            ['title'=>'سوني','lang'=>'ar','client_id'=>'8'],

            ['title'=>'Blue Bus','lang'=>'en','client_id'=>'9'],
            ['title'=>'بلو باص','lang'=>'ar','client_id'=>'9'],

            ['title'=>'LAMAR','lang'=>'en','client_id'=>'10'],
            ['title'=>'لامار','lang'=>'ar','client_id'=>'10'],

       ];
       DB::table('client_translations')->insert($translated_items);  

    }
}
