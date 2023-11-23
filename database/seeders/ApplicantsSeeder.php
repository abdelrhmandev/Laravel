<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ApplicantSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['name'=>'Jason Muller','email'=>'jason@siastudio.com','mobile'=>'0128745551','status'=>'pending','vacancy_id'=>'1'],
            ['name'=>'Matt Pears','email'=>'matt@stream.com','mobile'=>'0128745552','status'=>'rejected','vacancy_id'=>'2'],
            ['name'=>'Charlie Stone','email'=>'charlie@stone.com ','mobile'=>'0128745553','status'=>'pending','vacancy_id'=>'3'],
            ['name'=>'Sergei Ford','email'=>'sergei@ford.com ','mobile'=>'0128745554','status'=>'accepted','vacancy_id'=>'1'],
            ['name'=>'Hayes Boule','email'=>'hboule0@hp.com','mobile'=>'0128745555','status'=>'pending','vacancy_id'=>'2'],
            ['name'=>'Charlie Stone','email'=>'charlie@stone.com','mobile'=>'0128745556','status'=>'rejected','vacancy_id'=>'5'],
            ['name'=>'Jareb Labro','email'=>'jlabro2@kickstarter.com','mobile'=>'0128745557','status'=>'pending','vacancy_id'=>'6'],
            ['name'=>'Krishnah Tosspell ','email'=>'ktosspell3@flickr.com','mobile'=>'0128745558','status'=>'rejected','vacancy_id'=>'6'],
            ['name'=>'Dale Kernan','email'=>'dkernan4@mapquest.com','mobile'=>'0128745559','status'=>'pending','vacancy_id'=>'1'],
            ['name'=>'Tabby Callaghan','email'=>'tcallaghan8@squidoo.com','mobile'=>'0128745510','status'=>'accepted','vacancy_id'=>'8'],        
            ];
        DB::table('applicants')->insert($items);  
            
    }
}
