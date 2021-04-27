<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public $id_commentaire=1;
    public $id_auteur=1;
    public function definition()
    {

        return [
            'id'=>$this->id_commentaire++,
            'author_id'=>rand(1,\App\Models\User::all()->count()),
            'recipe_id'=>rand(1,\App\Models\Recipe::all()->count()),
            'content'=>$this->faker->text(300),
            'date'=>$this->faker->dateTime,
        ];
    }
}
