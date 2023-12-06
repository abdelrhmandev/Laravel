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
                'mobile'           =>'01872971280',
                'avatar'           =>'uploads/avatars/admin.jpg',
            ])->assignRole(1);

            
            \App\Models\User::create([    
                'username'         =>'NickLogan',
                'password'         =>bcrypt('12345678'),
                'email'            =>'NickLogan@domain.com',
                'name'             =>'Nick Logan',
                'is_admin'         =>'1',
                'mobile'           =>'01872971220',
                'avatar'           =>'uploads/avatars/nick.jpg',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'DanWilson',
                'password'         =>bcrypt('12345678'),
                'email'            =>'DanWilson@domain.com',
                'name'             =>'Dan Wilson',
                'is_admin'         =>'1',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'FrancisMitcham',
                'password'         =>bcrypt('12345678'),
                'email'            =>'FrancisMitcham@domain.com',
                'name'             =>'Francis Mitcham',
                'is_admin'         =>'1',
                'mobile'           =>'01872971230',
            ])->assignRole(3);

            \App\Models\User::create([    
                'username'         =>'Kevin',
                'password'         =>bcrypt('12345678'),
                'email'            =>'Kevin@domain.com',
                'name'             =>'Kevin Leonard',
                'is_admin'         =>'1',
                'mobile'           =>'01872971450',
                'avatar'           =>'uploads/avatars/kevin.jpg',
            ])->assignRole(4);

       
            \App\Models\User::create([    
                'username'         =>'JessieClarcson',
                'password'         =>bcrypt('12345678'),
                'email'            =>'JessieClarcson@domain.com',
                'name'             =>'Jessie Clarcson',
                'is_admin'         =>'1',
           ])->assignRole(3);


            \App\Models\User::create([    
                'username'         =>'ken',
                'password'         =>bcrypt('12345678'),
                'email'            =>'ken@domain.com',
                'name'             =>'ken Trump',
                'is_admin'         =>'1',
                'avatar'           =>'uploads/avatars/ken.jpg',
             
            ])->assignRole(5);

            \App\Models\User::create([    
                'username'         =>'Adam',
                'password'         =>bcrypt('12345678'),
                'email'            =>'Adam@domain.com',
                'name'             =>'Adam Mon',
                'is_admin'         =>'1',
            ]);
            \App\Models\User::create([    
                'username'         =>'Randy',
                'password'         =>bcrypt('12345678'),
                'email'            =>'Randy@domain.com',
                'name'             =>'Randy Mob',
                'is_admin'         =>'1',
            ]);
    
        ////////////////////

        \App\Models\User::create([    
            'username'         =>'Lebron',
            'password'         =>bcrypt('12345678'),
            'email'            =>'Lebron@domain.com',
            'name'             =>'Lebron Wayde',
            'is_admin'         =>'1',
            'avatar'           =>'uploads/avatars/lebron.jpg',
        ])->assignRole(3);


        \App\Models\User::create([    
            'username'         =>'AliceDanchik',
            'password'         =>bcrypt('12345678'),
            'email'            =>'AliceDanchik@domain.com',
            'name'             =>'Alice Danchik',
            'is_admin'         =>'1',
            'mobile'           =>'01872971150',
            'avatar'           =>'uploads/avatars/alice.jpg',
            
        ])->assignRole(4);

        \App\Models\User::create([    
            'username'         =>'Brad',
            'password'         =>bcrypt('12345678'),
            'email'            =>'Brad@domain.com',
            'name'             =>'Brad Simmons',
            'is_admin'         =>'1',
            'mobile'           =>'01872371450',
            'avatar'           =>'uploads/avatars/brad.jpg',
        ])->assignRole(2);
        


    }
}
