<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VacancySeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['title'=>'System Analyst','description'=>'Elicit requirements using interviews, document analysis, requirements workshops, surveys, site visits, business process descriptions, use cases, scenarios, business analysis, task and workflow','status'=>'1'],
            ['title'=>'Online Marketing Manager','description'=>'Manage, measure and optimize performance for advertising networks and other monetization channels , Manage relationships with advertisers & Produce performance reports and metrics.','status'=>'0'],
            ['title'=>'IT Technical Support','description'=>'Act as the first contact with employees who need technical assistance via phone, email or face to face
            Perform troubleshooting using different diagnostic techniques','status'=>'1'],
            ['title'=>'Web Designer','description'=>'To be fully responsible for the layout, visual appearance and usability of the company website, ensuring that brand continuity is maintained.','status'=>'0'],
            ['title'=>'Media sales representatives,','description'=>'Develop new business by finding out who holds the advertising budget in a target organisation and arranging to speak to them Persuade clients to buy advertising space / time in a particular medium','1'],
            ['title'=>'Account Handlers Handlersit','description'=>'Co-ordinate jobs Chase progress of jobs Facilitate meetings between client and members of the creative team Monitor effectiveness of advertising campaign.','status'=>'0'],
            ['title'=>'Quality control','description'=>'Supervises the day-to-day operations of Quality Control to ensure that work processes are implemented as designed and comply with established policies, processes and procedures.','status'=>'1'],
            ['title'=>'Odoo Presales Consultant','description'=>'OdooTec is hiring a team of experienced Odoo Presales Consultants with in-depth knowledge, and excellent track records in presales and implementing Odoo','status'=>'1'],
            ['title'=>'Senior Linux Engineer','description'=>'Install and maintain all server hardware and software systems and manage server performance.','status'=>'1'],
            ['title'=>'Search Engine Optimization Specialist','description'=>'We are looking for a Social media/SEO Specialist to manage social media different channels and search engine optimization and marketing activities','status'=>'0'],        
            ];
        DB::table('vacancies')->insert($items);  
            
    }
}
