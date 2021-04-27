<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::factory()->times(50)->create();

        //==>le code ci-dessous a utilisé pour insérer les données sans utiliser Factory.
        //Il a été remplacé par l'utilisation de faker.
        /*
        DB::table('recipes')->insert([
            [
         'id'=>'aa',
        'author_id' => '11',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),

    ],[
                'id'=>'bb',
        'author_id' => '22',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),

    ],[  'id'=>'cc',
        'author_id' => '33',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),

    ],[  'id'=>'dd',
        'author_id' => '44',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),

    ],[  'id'=>'ee',
        'author_id' => '55',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),

    ],[  'id'=>'ff',
        'author_id' => '66',
        'title'=>Str::random(10),
        'content'=>Str::random(40),
        'ingredients'=>Str::random(30),
        'url'=>Str::random(20),
                'date'=>Str::random(20),
        'status'=>Str::random(20),
    ]

    ]);
*/
    }
}
