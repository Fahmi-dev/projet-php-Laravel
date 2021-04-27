<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $recipe)
    {
        $recette=Recipe::find($recipe);

        // return view('pages.show', ['recipe'=>$recette,
        //   'titre_page'=>'Gestion des commentaires']);*/
        //modification

        return view('pagesCommentaire.suppressionCommentairesAdmin', ['recipe'=>$recette,
            'titre_page'=>'Gestion des commentaires']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $recipe_id=Comment::where('id',$id)->value('recipe_id');

        session_start();
        //on declare la session à null
        $_SESSION['supprimer']=null;

        $recipe=Recipe::find($recipe_id);
        Comment::find($id)->delete();

        //On donne à la session une nouvelle valeur
        $_SESSION['supprimer']='oui';


        return  view("pagesCommentaire.suppressionCommentairesAdmin",[ 'titre_page' =>"Gestion des commentaires",
            'recipe'=>$recipe]);

    }
}
