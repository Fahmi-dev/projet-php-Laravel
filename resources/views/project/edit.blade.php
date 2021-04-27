
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@extends('layouts.main')

@section('content')

    <h2>Modifier le project {{$recettes[0]->title}}</h2>

    <form method="POST" action="/project/{{$recettes[0]->id}}">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="id" placeholder="Identifiant" value="{{$recettes[0]->id}}">
        </div>
        <div>
            <input type="text" name="author_id" placeholder="Identifiant de l'auteur" value="{{$recettes[0]->author_id}}">
        </div>
        <div>
            <input type="text" name="title" placeholder="Titre" value="{{$recettes[0]->title}}">
        </div>
        <div>
            <textarea name="content" placeholder="Contenu">{{$recettes[0]->content}}</textarea>
        </div>
        <div>
            <textarea name="ingredients" placeholder="Ingredients">{{$recettes[0]->ingredients}}</textarea>
        </div>
        <div>
            <input type="text" name="url" placeholder="URL" value="{{$recettes[0]->url}}">
        </div>
        <div>
            <input type="date" name="date" placeholder="Date" value="{{$recettes[0]->date}}">
        </div>
        <div>
            <input type="text" name="status" placeholder="Status" value="{{$recettes[0]->status}}">
        </div>
        <div>
            <button type="submit">Modifier la recette</button>
        </div>
    </form>

    <form method="POST" action="/project/{{$recettes[0]->id}}">
        @csrf
        @method('DELETE')
        <div>
            <button type="submit">Supprimer la recette</button>
        </div>
    </form>
@endsection

</body>
</html>
