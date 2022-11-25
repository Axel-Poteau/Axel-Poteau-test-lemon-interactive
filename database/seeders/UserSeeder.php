<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = new User();
        $admin->nom = "Admin";
        $admin->prenom = "Admin";
        $admin->date_n = Date::now();
        $admin->email = "admin@test.com";
        $admin->email_verified_at = Date::now();
        $admin->sexe="admin";
        $admin->pays="France";
        $admin->metier="Administrateur";
        $admin->type="admin";
        $admin->password= Hash::make('admin1234');
        $admin->remember_token = "khkjdshjdhsjhds";
        $admin->save();
        User::factory(20)->create();


    }
}
