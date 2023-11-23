<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClientSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['title'=>'Adidas','link'=>'https://www.adidas.com/us','image'=>'uploads/clients/adidas.png'],
            ['title'=>'Nike','link'=>'https://www.nike.com/eg/','image'=>'uploads/clients/nike.png'],
            ['title'=>'Kappa','link'=>'https://www.kappa.com/','image'=>'uploads/clients/kappa.png'],
            ['title'=>'Prada','link'=>'https://www.prada.com/ww/en.html','image'=>'uploads/clients/prada.jpg'],
            ['title'=>'HP,','link'=>'https://www.hp.com/us-en/home.html','image'=>'uploads/clients/hp.png'],
            ['title'=>'Deloit','link'=>'https://www2.deloitte.com/us/en.html','image'=>'uploads/clients/deloitte.jpg'],
            ['title'=>'Nokia','link'=>'https://www.nokia.com/','image'=>'uploads/clients/nokia.png'],
            ['title'=>'Sony','link'=>'https://www.sony.com','image'=>'uploads/clients/sony.jpg'],
            ['title'=>'Blue Bus','link'=>'https://bluebus.com.eg/','image'=>'uploads/clients/bluebus.png'],
            ['title'=>'LAMAR','link'=>'https://www.lamaregypt.com/en','image'=>'uploads/clients/lamar.png'],        
            ];
        DB::table('clients')->insert($items);  
            
    }
}
