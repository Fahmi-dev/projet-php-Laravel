<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();
        //==>TEST
        /*
        DB::table('users')->insert([
            [
            'id' => '11',
            'name' =>'Alex',
            'email' => 'Alex@gmail.com',
            'password' => "1111",

        ],
            [
                'id' => '22',
                'name' =>'Sarah',
                'email' => 'Sarah@gmail.com',
                'password' => "2222",

            ],
            [
                'id' => '33',
                'name' =>'Sami',
                'email' => 'Sami@gmail.com',
                'password' => "3333",

            ],
            [
                'id' => '44',
                'name' =>'Mohammed',
                'email' => 'Mohammed@gmail.com',
                'password' => "4444",

            ],
            [
                'id' => '55',
                'name' =>'Gabriel',
                'email' => 'Gabriel@gmail.com',
                'password' => "5555",

            ], [

                'id' => '66',
                'name' =>'Patrick',
                'email' => 'Patrick@gmail.com',
                'password' => "6666",

            ]

       ] );
        */

        /*  $table->id();
          $table->string('name');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
  */
    }
}
