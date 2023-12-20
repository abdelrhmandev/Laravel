<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                'password'         =>Hash::make('12345678'),
                'email'            =>'admin@domain.com',
                'name'             =>'Abdelrahman Magdy',
                'is_admin'         =>'1',
                'mobile'           =>'01872971280',
                'avatar'           =>'uploads/avatars/admin.jpg',
                'status'           =>'1',
            ])->assignRole(1);

            
            \App\Models\User::create([    
                'username'         =>'NickLogan',
                'password'         =>Hash::make('12345678'),
                'email'            =>'NickLogan@domain.com',
                'name'             =>'Nick Logan',
                'is_admin'         =>'1',
                'mobile'           =>'01872971220',
                'avatar'           =>'uploads/avatars/nick.jpg',
                'status'           =>'1',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'DanWilson',
                'password'         =>Hash::make('12345678'),
                'email'            =>'DanWilson@domain.com',
                'name'             =>'Dan Wilson',
                'is_admin'         =>'1',
                'status'           =>'0',
            ])->assignRole(2);

            \App\Models\User::create([    
                'username'         =>'FrancisMitcham',
                'password'         =>Hash::make('12345678'),
                'email'            =>'FrancisMitcham@domain.com',
                'name'             =>'Francis Mitcham',
                'is_admin'         =>'1',
                'mobile'           =>'01872971230',
                'status'           =>'1',
            ])->assignRole(3);

            \App\Models\User::create([    
                'username'         =>'Kevin',
                'password'         =>Hash::make('12345678'),
                'email'            =>'Kevin@domain.com',
                'name'             =>'Kevin Leonard',
                'is_admin'         =>'1',
                'mobile'           =>'01872971450',
                'avatar'           =>'uploads/avatars/kevin.jpg',
                'status'           =>'1',
            ])->assignRole(4);

       
            \App\Models\User::create([    
                'username'         =>'JessieClarcson',
                'password'         =>Hash::make('12345678'),
                'email'            =>'JessieClarcson@domain.com',
                'name'             =>'Jessie Clarcson',
                'is_admin'         =>'1',
                'status'           =>'1',
           ])->assignRole(3);


            \App\Models\User::create([    
                'username'         =>'ken',
                'password'         =>Hash::make('12345678'),
                'email'            =>'ken@domain.com',
                'name'             =>'ken Trump',
                'is_admin'         =>'1',
                'avatar'           =>'uploads/avatars/ken.jpg',
                'status'          =>'1',
                
             
            ])->assignRole(5);

            \App\Models\User::create([    
                'username'         =>'Adam',
                'password'         =>Hash::make('12345678'),
                'email'            =>'Adam@domain.com',
                'name'             =>'Adam Mon',
                'is_admin'         =>'1',
                'status'           =>'0',
            ]);
            \App\Models\User::create([    
                'username'         =>'Randy',
                'password'         =>Hash::make('12345678'),
                'email'            =>'Randy@domain.com',
                'name'             =>'Randy Mob',
                'is_admin'         =>'1',
                'status'          =>'1',
            ]);
    
        ////////////////////

        \App\Models\User::create([    
            'username'         =>'Lebron',
            'password'         =>Hash::make('12345678'),
            'email'            =>'Lebron@domain.com',
            'name'             =>'Lebron Wayde',
            'is_admin'         =>'1',
            'avatar'           =>'uploads/avatars/lebron.jpg',
            'status'          =>'1',
        ])->assignRole(3);


        \App\Models\User::create([    
            'username'         =>'AliceDanchik',
            'password'         =>Hash::make('12345678'),
            'email'            =>'AliceDanchik@domain.com',
            'name'             =>'Alice Danchik',
            'is_admin'         =>'1',
            'mobile'           =>'01872971150',
            'avatar'           =>'uploads/avatars/alice.jpg',
            'status'           =>'0',
            
        ])->assignRole(4);

        \App\Models\User::create([    
            'username'         =>'Brad',
            'password'         =>Hash::make('12345678'),
            'email'            =>'Brad@domain.com',
            'name'             =>'Brad Simmons',
            'is_admin'         =>'1',
            'mobile'           =>'01872371450',
            'avatar'           =>'uploads/avatars/brad.jpg',
            'status'          =>'1',
        ])->assignRole(2);
        


    }
}
