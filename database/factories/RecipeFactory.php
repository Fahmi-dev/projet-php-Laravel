<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $id_recette=1;
    public $id_auteur=11;
    public $compteur_id_auteur=10;
    public function definition()
    {
        //On veut s'assurer que chaque auteur a au moins une recette
        if($this->compteur_id_auteur >=1){
            $this->id_auteur--;
        }
        //dès qu'on arrive à 1, on veut donner une recette à un auteur aléatoirement.
        else{
            $this-> id_auteur= rand(1,\App\Models\User::all()->count());
        }
        $this->compteur_id_auteur--;
        ///////////////////////////////////
        return [

            'id'=>$this->id_recette++,
            'author_id'=>$this->id_auteur,
            'title'=>$this->faker->text(20),
            'content'=>$this->faker->text(300),
            'ingredients'=>$this->faker->text(200),
            'url'=>$this->faker->text(200),
            'date'=>$this->faker->dateTime,
            'status'=>$this->faker->text(45),
        ];
    }
}
