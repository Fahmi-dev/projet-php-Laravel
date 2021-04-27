<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Events\ProjectCreated;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recipe::all();
        return view('project.index', compact('recettes'),['titre_page'=>'Administration des recettes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create',['titre_page'=>'Administration des recettes']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $recipe = Recipe::create(request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'id' => 'required'
        ]));

        ProjectCreated::dispatch($recipe);

        return redirect('/project')
            ->with('message', 'Projet créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('project.show', compact('recipe'), ['titre_page'=>'Administration des recettes']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('project.edit',compact('recipe'),['titre_page'=>'Administration des recettes']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
        $recipe->id = request('id'); //on set le titre avec la donnée envoyée du formulaire
        $recipe->author_id = request('author_id');
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->ingredients = request('ingredients');
        $recipe->url = request('url');
        $recipe->date = request('date');
        $recipe->status = request('status');
        $recipe->update(request(['id','author_id','title', 'content','ingredients','url','date','status'])); // on enregistre dans la base
        return redirect('/project',['titre_page'=>'Administration des recettes']); // méthode pour rediriger vers une autre url (en get par défaut)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/project',['titre_page'=>'Administration des recettes']);
    }
}
