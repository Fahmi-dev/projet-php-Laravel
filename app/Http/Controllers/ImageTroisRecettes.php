<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ImageTroisRecettes extends Controller
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
    public function show($id)
    {
        //
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
        $request->validate(
            [
                'image'=>'required | mimes:jpg,png|max:5048'
            ]
        );

        $newImageName=time().'-'.'image'.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
//On a besoin de savoir la date et l'heure exacte car l'heure n'est pas correcte sur SQLITE.
// il ya une différence de deux heures avec l'heure actuelle en France.
        if(date_default_timezone_get()){
            $datetime= "default".date_default_timezone_set('Europe/Paris');
        }
        $dateLocal=date("Y-m-d h:i:sa");
        $dateLocal= substr($dateLocal, 0, 19);

        $recipe=Recipe::find($id);
        $recipe->date=$dateLocal;
        $recipe->image_path=$newImageName;

//On ouvre une session pour un enoyer un message flash si la photo est importé avec succès.
        session_start();
        //on declare la session à null
        $_SESSION['flashMessagePhoto']=null;

        $recipe->update(request([
            'date' ,
            'image_path' ,
        ]));

        $troisDernieresRecettes=Recipe::all()->take(-3);




        //On donne à la session une nouvelle valeur
        $_SESSION['flashMessagePhoto']='yes';

         return view('welcome',['troisDernieresRecettes'=>$troisDernieresRecettes,'titre_page'=>'Welcome']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
