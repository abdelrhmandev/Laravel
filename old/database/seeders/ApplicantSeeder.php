<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ApplicantSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['name'=>'Jason Muller','email'=>'jason@siastudio.com','mobile'=>'0128745551','status'=>'pending','vacancy_id'=>'1','file'=>'uploads/cvs/1.docx'],
            ['name'=>'Matt Pears','email'=>'matt@stream.com','mobile'=>'0128745552','status'=>'rejected','vacancy_id'=>'2','file'=>'uploads/cvs/2.pdf'],
            ['name'=>'Charlie Stone','email'=>'charlie@stone.com ','mobile'=>'0128745553','status'=>'holded','vacancy_id'=>'3','file'=>'uploads/cvs/3.pdf'],
            ['name'=>'Sergei Ford','email'=>'sergei@ford.com ','mobile'=>'0128745554','status'=>'accepted','vacancy_id'=>'1','file'=>'uploads/cvs/4.pdf'],
            ['name'=>'Hayes Boule','email'=>'hboule0@hp.com','mobile'=>'0128745555','status'=>'pending','vacancy_id'=>'2','file'=>'uploads/cvs/5.pdf'],
            ['name'=>'Teresa Fox','email'=>'teresa@festudios.com','mobile'=>'0128745556','status'=>'rejected','vacancy_id'=>'5','file'=>'uploads/cvs/6.pdf'],
            ['name'=>'Jareb Labro','email'=>'jlabro2@kickstarter.com','mobile'=>'0128745557','status'=>'pending','vacancy_id'=>'6','file'=>'uploads/cvs/7.pdf'],
            ['name'=>'Krishnah Tosspell ','email'=>'ktosspell3@flickr.com','mobile'=>'0128745558','status'=>'rejected','vacancy_id'=>'6','file'=>'uploads/cvs/8.pdf'],
            ['name'=>'Dale Kernan','email'=>'dkernan4@mapquest.com','mobile'=>'0128745559','status'=>'holded','vacancy_id'=>'1','file'=>'uploads/cvs/9.pdf'],
            ['name'=>'Tabby Callaghan','email'=>'tcallaghan8@squidoo.com','mobile'=>'0128745510','status'=>'accepted','vacancy_id'=>'8','file'=>'uploads/cvs/10.pdf'],        
            ];
        DB::table('applicants')->insert($items);              
    }
}
