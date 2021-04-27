<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Recipe;
use Faker\Factory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//fonction juste pour tester le code. On le prend pas en compte
    public function index()
    {
        return view('home');
    }
    public function afficherRecettes()
    {
        $data= Recipe::all();
        return view('/recettes',['titre_page'=>'Recettes','data_recettes'=>$data]);
    }
    public function afficher3DernieresRecettes()
    {

        $troisDernieresRecettes=Recipe::all()->take(-3);

        return view('welcome',['titre_page'=>'Accueil','troisDernieresRecettes'=> $troisDernieresRecettes ]);
    }


}
