<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show($url) {
   $data_recipe=Recipe::where('url',$url)->get();
   $id_user="";
        foreach ($data_recipe as $dr) {
           $id_user=  $dr->author_id;
        }

        return view('recette1',['id_user'=>$id_user,'titre_page'=>'Recettes']);

    }

}
