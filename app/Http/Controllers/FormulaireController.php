<?php

namespace App\Http\Controllers;
use \App\Models\Contact;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Validation\Validator;

class FormulaireController extends Controller
{
    function pageContact(){
        return view('contact',['titre_page'=>'Contact']);
    }

//formulaire de contact
    function enregistrer(Request $request){



//Validation

        $regles = [

            'nom' => 'required|min:2|regex:/(^(([a-zA-Zéèàç]+)(\s+)*){1,5}$)/u',
            'mail' => 'required|email',
            'message' => 'required|min:2|',

        ];

        $messages = [
            'required' => 'Le champ :attribute ne doit pas être vide.',
            'mail'=>'Le champ :attribute doit être une adresse électronique valide.',
            'min'=>'Le champ :attribute doit avoir au minimum 2 caractères.',

            'regex'=>'Le champ :attribute n\'est pas valide. les caractères spéciaux, les chiffres et
             ne sont pas autorisés' ,
        ];

        $this->validate($request, $regles, $messages);

        $idCommentaire=null;
        $DataDernierId=null;
        //on prend le dernier id et incrémente l'id toujours par 1.Dans le cas ou les données
        //du dernier contact est vide ou null, cela veut dire et le table est encore vide. Donc on
        //initialise l'id à 1.
        $DataDernierId=Contact::all()->take(-1);
        if($DataDernierId==null||$DataDernierId->isEmpty()){
            $idCommentaire=1;
        }

        else{
            foreach ($DataDernierId as $data){
                //On recupère le dernier id et on l'incrémente 1 et on l'affecte à notre nouveau id
                $idCommentaire=$data->id+1;}
        }

        //on va prendre l'heure exacte pour enregistré notre commentaire. Sur SQLITE la date n'est pas correcte
       if(date_default_timezone_get()){
            $datetime= "default".date_default_timezone_set('Europe/Paris');
        }
        $dateLocal=date("Y-m-d h:i:sa");
        $dateLocal= substr($dateLocal, 0, 19);




                $identifiant = $idCommentaire;
                $nom = $request->nom;
                $mail = $request->mail;
                $message = $request->message;
                $date = $dateLocal;


                $data_contact = new Contact;

                $data_contact->id = $identifiant;
                $data_contact->name = $nom;
                $data_contact->email = $mail;
                $data_contact->message = $message;
                $data_contact->date = $date;



                //On ouvre une session pour déclencher un event JS qui va
                // afficher un message flash dans le cas ou les données sont enregistrées
                session_start();
                $_SESSION['flashMessageEnregistrement']=null;

                $data_contact->save();
                //On donne à la session une nouvelle valeur car les données sont bien enregistrées maintenant
                $_SESSION['flashMessageEnregistrement']='contactEnregistre';


                // return view('enregistrementContact',['infosContactEnregistrees'=>[$identifiant,$nom,$mail,$message, $date ], 'titre_page'=>'Recettes','d'=>$d]);

                return redirect()->route( 'contact' )->with( ['date'=> $dateLocal ,'nom'=>$nom,'mail'=>$mail,'message'=>$message] );



    }
}
