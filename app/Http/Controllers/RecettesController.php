<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Validator;
use function GuzzleHttp\Promise\all;



class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $recipes = Recipe::all();

        return view('pages.index',
            ['titre_page' => 'Administration des recettes','recipes'=>$recipes ]);


        /* $recette=new Recipe;
         $recettes=$recette::all();

         return view('pages.edit',['titre_page'=>'Administration des Recettes','recettes'=>$recettes]);
    */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.creer', ['titre_page' =>'Création d\'une recette']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation
        //Validation
        $les_regles = [
            'id'=>'required',
            'author_id'=>'required',
            'title' => 'required|min:2',
            'content' => 'required|min:10',
            'ingredients' => 'required|min:10',
            'url' => 'required|min:5',
            'date'=>'required | date',
            'status'=>'required |regex:/(^([a-zA-Z]+.*)$)/u',
        ];

        $les_messages = [
            'required' => 'Le champ :attribute ne doit pas être vide.',
            'min'=>'les nombres de caractères dans le champ :attribute doit être plus long.',
            'date'=>'Le champ :attribute n\'est pas une date valide.',
            'regex'=>'Le champ :attribute n\'est pas valide.' ,
        ];

        $this->validate($request, $les_regles, $les_messages);

        session_start();
        //on declare la session à null
        $_SESSION['recetteAjoute']=null;

        //On donne à la session une nouvelle valeur


        if (Recipe::where('id',  $request->id)->exists())
        {
            $_SESSION['recetteAjoute']='non';
            return redirect('admin/recettes/create');
        } else {
            Recipe::create($request->all());
            $_SESSION['recetteAjoute']='oui';
            return redirect('/admin/recettes');
        }






    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */

    public function show( $recipe)
    {
        $recette=Recipe::find($recipe);

       // return view('pages.show', ['recipe'=>$recette,
         //   'titre_page'=>'Gestion des commentaires']);*/
        //modification

        return view('pagesCommentaire.gestionCommentaires', ['recipe'=>$recette,
            'titre_page'=>'Gestion des commentaires']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit( $recipe)
    {
        $data=Recipe::all();

        return view('pages.edit', ['recipe'=>$recipe,'data'=>$data ,
            'titre_page' =>'Modification d\'une recette']);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $recipe)
    {
        $les_regles = [
            'identifiant'=>'required',
            'id_auteur'=>'required',
            'titre' => 'required|min:2|regex:/(^([a-zA-Z]+.*)$)/u',
            'contenu' => 'required|min:10|regex:/(^([a-zA-Z]+.*)$)/u',
            'ingredients' => 'required|min:10|regex:/(^([a-zA-Z]+.*)$)/u',
            'URL' => 'required|min:5|regex:/(^([a-zA-Z]+.*)$)/u',
            'date'=>'required | date',
            'statut'=>'required |regex:/(^([a-zA-Z]+.*)$)/u',
        ];

        $les_messages = [
            'required' => 'Le champ :attribute ne doit pas être vide.',
            'min'=>'les nombres de caractères dans le champ :attribute doit être plus long.',
            'date'=>'Le champ :attribute n\'est pas une date valide.',
            'regex'=>'Le champ :attribute n\'est pas valide.' ,
        ];

        $this->validate($request, $les_regles, $les_messages);

        $recipe=Recipe::find($recipe);
        $recipe->id=request('identifiant');
        $recipe->author_id=request('id_auteur');
        $recipe->title=request('titre');
        $recipe->content=request('contenu');
        $recipe->ingredients=request('ingredients');
        $recipe->url=request('URL');
        $recipe->date=request('date');
        $recipe->status=request('statut');

        $recipe->update(request([
            'identifiant' ,
            'id_auteur',
            'titre' ,
            'contenu' ,
            'ingredients' ,
            'URL' ,
            'date' ,
            'statut' ,
        ]));


        return redirect('/admin/recettes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy( $recipe)
    {


        session_start();
        //on declare la session à null
        $_SESSION['supprumerUneRecette']=null;

        Recipe::find($recipe)->delete();
        //On donne à la session une nouvelle valeur car la recette a été supprumé.
        $_SESSION['supprumerUneRecette']='oui';


        return redirect('/admin/recettes');
    }
}
