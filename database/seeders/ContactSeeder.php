<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();        
        $items = [        
            ['name'=>Str::random(10),'email'=>Str::random(10).'@gmail.com','subject'=>Str::random(15),'message'=>Str::random(30),'created_at'=>Carbon::now()->subDay(10)], 
        ];
           DB::table('contacts')->insert($items);      
    
    }
}
