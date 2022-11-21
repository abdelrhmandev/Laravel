<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $insertions                  = [
            [
                'title'         => 'العربيه',
                'dir'         => 'rtl',
                'code'            => 'ar',
                'flag'             => 'languages/flags/ar.svg'
            ],
            [
                'title'         => 'English',
                'dir'         => 'ltr',
                'code'            => 'en',
                'flag'             => 'languages/flags/en.svg'
            ],
        ];
        DB::table('languages')->insert($insertions);

    }
}
