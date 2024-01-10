<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ContactSeeder extends Seeder
{

    //https://dev.to/olodocoder/laravel-seeding-generate-mock-data-using-faker-5473
    public function run()
    {

        //slug = $faker->unique()->slug
        DB::table('contacts')->delete();              
        $faker = Faker::create();
      
        for ($i=0; $i < 20; $i++) {    
        $items = [        
                ['name'=>$faker->name,'email'=>$faker->email,'subject'=>$faker->words(10, true),'message'=>$faker->sentence(45),'created_at'=>Carbon::now()->subDay(10)], 
            ];
           DB::table('contacts')->insert($items);      
        }

    
    }
}
