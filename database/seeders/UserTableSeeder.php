<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin= user::create([
            'first_name' => 'super',
            'last_name'  => 'admin',
            'email'      => 'super_admin@gmail.com',
            'phone'      =>23741780,
            'address'      =>'sfax,agareb',
            'password'   =>  Hash::make('123456'),
           ]);
           $super_admin->assignRole('super_admin');
        $user= user::create([
            'first_name' => 'super',
            'last_name'  => 'admin',
            'email'      => 'user@gmail.com',
            'phone'      =>23741780,
            'address'      =>'sfax agareb',
            'password'   =>  Hash::make('123456'),
           ]);
           $user->assignRole('agent');
            /*  $super_admin->attachRole('super_admin');
    
            $permissions=['create_users','update_users'];
            $admin=user::create([
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'email'      => 'admin@gmail.com',
            'password'   =>  Hash::make('123456'),
            ]);
            $admin->attachRole('admin');
            $admin->syncPermissions($permissions);
            $admin1=user::create([
            'first_name' => 'admin1',
            'last_name'  => 'admin1',
            'email'      => 'admin1@gmail.com',
            'password'   =>  Hash::make('123456'),
            ]);
            $admin1->attachRole('admin');
            $admin1->syncPermissions($permissions);
    
    
        }  */
        
    }
}
