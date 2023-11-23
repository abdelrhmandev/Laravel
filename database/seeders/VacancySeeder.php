<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VacancySeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['title'=>'System Analyst','description'=>'Elicit requirements using interviews, document analysis, requirements workshops, surveys, site visits, business process descriptions, use cases, scenarios, business analysis, task and workflow','status'=>'1']
        ];
        DB::table('vacancies')->insert($items);  
            
    }
}
