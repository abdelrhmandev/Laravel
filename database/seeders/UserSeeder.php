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
                'username'         =>'Kevin',
                'password'         =>bcrypt('12345678'),
                'email'            =>'Kevin@domain.com',
                'name'             =>'Kevin Leonard',
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
                'username'         =>'Natali',
                'password'         =>bcrypt('12345678'),
                'email'            =>'Natali@domain.com',
                'name'             =>'Natali Trump',
                'is_admin'         =>'1',
            ])->assignRole(5);


        ////////////////////

        \App\Models\User::create([    
            'username'         =>'Lebron',
            'password'         =>bcrypt('12345678'),
            'email'            =>'Lebron@domain.com',
            'name'             =>'Lebron Wayde',
            'is_admin'         =>'1',
        ])->assignRole(3);


        \App\Models\User::create([    
            'username'         =>'Jessie',
            'password'         =>bcrypt('12345678'),
            'email'            =>'Jessie@domain.com',
            'name'             =>'Jessie Clarcson',
            'is_admin'         =>'1',
        ])->assignRole(4);

        \App\Models\User::create([    
            'username'         =>'Brad',
            'password'         =>bcrypt('12345678'),
            'email'            =>'Brad@domain.com',
            'name'             =>'Brad Simmons',
            'is_admin'         =>'1',
        ])->assignRole(2);
    }
}
