<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\User;

use CodeDelivery\Models\Client;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'=>'Thiago Fernandes',
            'email'=>'thiagofdso.ufpa@gmail.com',
            'password'=>bcrypt('123456'),
            'remember_token' => str_random(10),
            'confirmed'=>1,
            'role'=>'admin',
        ]);
        factory(User::class)->create([
            'name'=>'Admin',
            'email'=>'admin@user.com',
            'password'=>bcrypt('123456'),
            'remember_token' => str_random(10),
            'confirmed'=>1,
            'role'=>'admin',
        ]);
        factory(User::class)->create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('123456'),
            'remember_token' => str_random(10),
            'confirmed'=>1,
            'role'=>'client',
        ]);
        factory(User::class,5)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
