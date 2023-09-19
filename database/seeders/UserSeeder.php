<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

          \App\Models\User::create([     
                'username'         =>'admin',
                'password'         =>bcrypt('12345678'),
                'email'            =>'admin@domain.com',
                'name'             =>'Abdelrahman Magdy',
                'is_admin'         =>'1',
                'avatar'           =>'uploads/avatars/admin.jpg',
            ])->assignRole(1);

            \App\Models\User::create([    
                'username'         =>'johndoe',
                'password'         =>bcrypt('12345678'),
                'email'            =>'johndoe@domain.com',
                'name'             =>'John Doe',
                'is_admin'         =>'1',
                'avatar'           =>'uploads/avatars/johndoe.jpg',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'vigo',
                'password'         =>bcrypt('12345678'),
                'email'            =>'vigo@domain.com',
                'name'             =>'vigo mavy',
                'is_admin'         =>'1',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'lary',
                'password'         =>bcrypt('12345678'),
                'email'            =>'lary@domain.com',
                'name'             =>'lary Mat',
                'is_admin'         =>'1',
            ])->assignRole(3);

            \App\Models\User::create([    
                'username'         =>'dany',
                'password'         =>bcrypt('12345678'),
                'email'            =>'dany@domain.com',
                'name'             =>'Dany oliver',
                'is_admin'         =>'1',
                'avatar'           =>'uploads/avatars/dany.jpg',
            ])->assignRole(4);

       
            \App\Models\User::create([    
                'username'         =>'Tam',
                'password'         =>bcrypt('12345678'),
                'email'            =>'tam@domain.com',
                'name'             =>'Tam oliver',
                'is_admin'         =>'1',
            ])->assignRole(3);


            \App\Models\User::create([    
                'username'         =>'vgo',
                'password'         =>bcrypt('12345678'),
                'email'            =>'vgo@domain.com',
                'name'             =>'vgo oliver',
                'is_admin'         =>'1',
            ])->assignRole(5);


    }
}
