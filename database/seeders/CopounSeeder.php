<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CopounSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    
        DB::table('coupons')->delete();

        
        $data=array(
            array(
                'code'=>'abc123',
                'type'=>'fixed',
                'value'=>'300',
                'published'=>'1'
            ),
            array(
                'code'=>'111111',
                'type'=>'percent',
                'value'=>'10',
                'published'=>'0'
            ),          
              array(
                'code'=>'zhvb123',
                'type'=>'fixed',
                'value'=>'650',
                'published'=>'0'
            ),
            array(
                'code'=>'26661',
                'type'=>'percent',
                'value'=>'30',
                'published'=>'1'
            ),
        );

        DB::table('coupons')->insert($data);
    }
}
