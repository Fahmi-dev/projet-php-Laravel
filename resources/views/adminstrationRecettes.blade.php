
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Administration des recettes</title>
</head>
<body>

@extends('layouts.main')

@section('content')
    <form method="POST" action="/admin/recettes" >
        @csrf

        id : <input type="text" name="id" placeholder="Identifiant">
        Identifiant de l'auteur : <input type="text" name="author_id" placeholder="Identifiant de l'auteur">
        Titre : <input type="text" name="title" placeholder="Titre">
        Contenu: <input type="text" name="content" placeholder="Contenu">
        Ingrédients: <input type="text" name="ingredients" placeholder="Ingrédients">
        URL : <input type="text" name="url" placeholder="URL">
        Statut : <input type="text" name="status" placeholder="Statut">
        Date : <input type="date" name="date" placeholder="Date">
         <input type="submit" >
    </form>
<a href="/admin/{{$recettes[0]->title}}">show</a>
@endsection

</body>
</html>
