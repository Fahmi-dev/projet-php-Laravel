
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@extends('layouts.main')

@section('content')
    <form action="/admin/recettes/edit" >
        @csrf
id : <input type="text" name="id" placeholder="Identifiant">
Identifiant de l'auteur : <input type="text" name="author_id" placeholder="Identifiant de l'auteur">
Titre : <input type="text" name="title" placeholder="Titre">
Contenu: <input type="text" name="content" placeholder="Contenu">
Ingrédients: <input type="text" name="ingredients" placeholder="Ingrédients">
URL : <input type="text" name="url" placeholder="URL">
Date : <input type="date" name="date" placeholder="Date">
Date : <input type="submit" >
    </form>
@endsection

</body>
</html>
