<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Recipe;
use App\Models\Contact;
use App\Http\Controllers\RecettesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Location;



class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetteCommenteId=null;
        session_start();
        if(isset($_SESSION['idRecetteCommente'])&&!empty($_SESSION['idRecetteCommente'])) {
            $recetteCommenteId = $_SESSION['idRecetteCommente'];
            //on détruit la session
            session_destroy();
        }
        $recipe= Recipe::find($recetteCommenteId);

        return view('pagesCommentaire.gestionCommentaires',['titre_page'=>'Gestion des commentaires','recipe'=>$recipe]);
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

        $DataDernierId=Comment::all()->take(-1);
        $idCommentaire=null;
        $recetteCommenteId=null;
        $idUserConnecte=null;

        //on recupère l'id du dernier commentaire enregistré dans la table Comment et on l'incrémente +1 pour s'assurer
        // que l'id de prochain commentaire qu'on va enregistré soit unique.
        foreach ($DataDernierId as $data){
            $idCommentaire=$data->id;}

        //On recupère l'id de l'identifiant qu'on a recuperé grace à la session
        if(session_status() === PHP_SESSION_NONE)
        { session_start();}
        //On s'assure que la valeur retourné par la session n'est pas vide.
        if(isset($_SESSION['idRecetteCommente'])&&!empty($_SESSION['idRecetteCommente'])) {
            $recetteCommenteId = $_SESSION['idRecetteCommente'];
            //on détruit la session
            session_destroy();
        }

        if(Auth::check()){
            $idUserConnecte= Auth::user()->id;}

//on va prendre l'heure exacte pour enregistré notre commentaire. Sur SQLITE la date n'est pas correcte
        if(date_default_timezone_get()){
            $datetime= "default".date_default_timezone_set('Europe/Paris');
        }
        $dateLocal=date("Y-m-d h:i:sa");
        $dateLocal= substr($dateLocal, 0, 19);

        request()->validate([
            'contenu' => 'required',
        ]);

        Comment::create([
            'id' => ++$idCommentaire,
            'author_id'=>$idUserConnecte,
            'recipe_id' => $recetteCommenteId,
            'content' => request('contenu'),
            'created_at'=>$dateLocal,
            'updated_at'=>$dateLocal,
        ]);

        // $data_Commentaire=Comment::where('url',$url)->get();

        $recipe=Recipe::find($recetteCommenteId);
        // $commentairesRecette=Comment::where('id',$idCommentaire)->get();


        return  view("pagesCommentaire.gestionCommentaires",[ 'titre_page' =>"Gestion des commentaires",
            'recipe'=>$recipe]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responsew
     */
    public function show($id)
    {

//On recupère l'id de l'identifiant qu'on a recuperé grace à la session
        session_start();
        //On s'assure que la valeur retourné par la session n'est pas vide.
        if(isset($_SESSION['idRecetteCommente'])&&!empty($_SESSION['idRecetteCommente'])) {
            $recetteCommenteId = $_SESSION['idRecetteCommente'];
            //on détruit la session
            session_destroy();
        }

        $recipe=Recipe::find($recetteCommenteId);

        return  view("pagesCommentaire.gestionCommentaires",[ 'titre_page' =>"Gestion des commentaires", 'recipe'=>$recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire=Comment::where('id',$id)->value('content');



        return  view("pagesCommentaire.edit",[ 'titre_page' =>"Modification d'un commentaire",'commentaire'=>$commentaire,'id'=>$id]);

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
//On a besoin de savoir la date et l'heure exacte car l'heure n'est pas correcte sur SQLITE.
// il ya une différence de deux heures avec l'heure actuelle en France.
        if(date_default_timezone_get()){
            $datetime= "default".date_default_timezone_set('Europe/Paris');
        }
        $dateLocal=date("Y-m-d h:i:sa");
        $dateLocal= substr($dateLocal, 0, 19);

        request()->validate([
            'contenu' => 'required',
        ]);

        $commentaire=Comment::find($id);
        $commentaire->content=request('contenu');
        $commentaire->updated_at=$dateLocal;

        $commentaire->update(request([
            'contenu' ,
            'updated_at']));

        $recetteCommenteId=null;
        //On recupère l'id de l'identifiant qu'on a recuperé grace à la session
        session_start();
        //On s'assure que la valeur retourné par la session n'est pas vide.
        if(isset($_SESSION['idRecetteCommente'])&&!empty($_SESSION['idRecetteCommente'])) {
            $recetteCommenteId = $_SESSION['idRecetteCommente'];
            //on détruit la session
            session_destroy();
        }




        $recipe= Recipe::find($recetteCommenteId);




        return  view("pagesCommentaire.gestionCommentaires",[ 'titre_page' =>"Gestion des Commentaire",'recipe'=>$recipe]);


        //return redirect('/commentaire']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $recipe_id=Comment::where('id',$id)->value('recipe_id');

        $recipe=Recipe::find($recipe_id);
        Comment::find($id)->delete();


        return  view("pagesCommentaire.gestionCommentaires",[ 'titre_page' =>"Gestion des commentaires",
            'recipe'=>$recipe]);
    }
}
