<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            [
                'id' => '1',
                'name' =>'John',
                'email' => 'john@gmail.com',
                'message'=>Str::random(50),
                'date'=>Str::random(40),
            ],[
                'id' => '2',
                'name' =>'Jackie',
                'email' => 'Jackie@gmail.com',
                'message'=>Str::random(50),
                'date'=>Str::random(40),
            ],[
                'id' => '3',
                'name' =>'Rami',
                'email' => 'Rami@gmail.com',
                'message'=>Str::random(50),
                'date'=>Str::random(40),
            ],[
                'id' => '4',
                'name' =>'Marie',
                'email' => 'Marie@gmail.com',
                'message'=>Str::random(50),
                'date'=>Str::random(40),
            ]
        ]);
    }
}
