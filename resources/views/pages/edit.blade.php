
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer une recette</title>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .alert_danger{
            color: red;
        }
    </style>

</head>
<body style="background:url('/images/edit.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover; border-radius: 1em; " >
@extends('layouts.main')

@section('content')
<div  class="container max-w-full mx-auto pt-4" style="width: 300px; margin-left: 150px;">
    <form method="POST" action="/admin/recettes/{{$recipe}}" >
        @csrf
@method('PATCH')

        <div class="mb-4">
            <label style="color: red" class="font-bold " for="id">Identifiant de la recette </label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0" name="identifiant" value="{{$data->find($recipe)->id}}">

        </div>
        @error('identifiant')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold " style="color: red" for="author_id">Identifiant de l'auteur de la recette </label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0" name="id_auteur" value="{{$data->find($recipe)->author_id}}">
        </div>
        @error('id_auteur')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold " style="color: red" for="title"> Titre </label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400
            focus:ring-0"  name="titre" value="{{$data->find($recipe)->title}}">
        </div>
        @error('titre')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold " style="color: red" for="content">Contenu </label>
            <textarea  style="height: 150px;" rows="80" class="h-16 bg-white border border-gray-300  py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0"  name="contenu">{{$data->find($recipe)->content}}</textarea>
        </div>
        @error('contenu')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold" style="color: red" for="ingredients">Ingrédients </label>
            <textarea  type="text" style="height: 150px;" class="h-16 bg-white border border-gray-300  py-4 px-3 mr-4 w-full text-gray-600
            " name="ingredients" >{{$data->find($recipe)->ingredients}}</textarea>
        </div>
        @error('ingredients')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold" style="color: red" for="url"> URL </label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
             text-sm focus:outline-none  focus:border-gray-400 focus:ring-0"  name="URL" value="{{$data->find($recipe)->url}}">
        </div>
        @error('URL')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold" style="color: red" for="date"> Date </label>
            <input  class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0"  name="date" value="{{$data->find($recipe)->date}}">
        </div>
        @error('date')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <div class="mb-4">
            <label class="font-bold" style="color: red" for="date"> Statut </label>
            <input  class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0"  name="statut" value="{{$data->find($recipe)->status}}">
        </div>
        @error('statut')
        <div class="alert_danger"> {{$message}}</div>
        @enderror

        <button class="bg-green-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg  hover:shadow">Modifier</button>

        <a href="/admin/recettes" class="bg-gray-500 tracking-wide text-white px-6 py-2  mb-6 shadow-lg  hover:shadow">Annuler</a>

    </form>
</div>
</body>
@endsection
</html>
