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

          \App\Models\User::create([     
                'username'         =>'admin',
                'password'         =>bcrypt('12345678'),
                'email'            =>'admin@domain.com',
                'name'             =>'Abdelrahman Magdy',
                'is_admin'         =>'1',
            ]);
            \App\Models\User::create([    
                'username'         =>'johndoe',
                'password'         =>bcrypt('12345678'),
                'email'            =>'johndoe@domain.com',
                'name'             =>'John Doe',
                'is_admin'         =>'1',
            ]);
            \App\Models\User::create([    
                'username'         =>'vigo',
                'password'         =>bcrypt('12345678'),
                'email'            =>'vigo@domain.com',
                'name'             =>'vigo mavy',
                'is_admin'         =>'1',
            ]);
            \App\Models\User::create([    
                'username'         =>'lary',
                'password'         =>bcrypt('12345678'),
                'email'            =>'lary@domain.com',
                'name'             =>'lary Mat',
                'is_admin'         =>'1',
            ]);
            \App\Models\User::create([    
                'username'         =>'dany',
                'password'         =>bcrypt('12345678'),
                'email'            =>'dany@domain.com',
                'name'             =>'Dany oliver',
                'is_admin'         =>'1',
            ]);

       
    

    }
}
