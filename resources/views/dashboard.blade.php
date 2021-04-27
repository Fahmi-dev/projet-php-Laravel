<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Gestion des recettes</title>


</head>
@extends('layouts.main')



@section('content')

    <body>


    <div  style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <h1 class="text-4xl font-bold mb-4">La liste des recettes</h1>

        <form method="GET" action="/admin/recettes/create" class="bouton">
            <button  style="width: 130%; display: inline-block" class="bg-red-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">ajouter</button>
        </form>

        <hr class="mt-2">
        <hr class="mt-2">
        <br>



        @foreach($recipes as $recipe)
            <article class="mb-2">
                <div class="text-xl font-bold text-blue-500">{{ $recipe->title }}</div>
                <p class="text-md text-gray-600">{{ $recipe->content }}</p>

                <form action="/admin/recettes/{{$recipe->id}}" method="POST" class="bouton">
                    @csrf
                    @method('DELETE')

                    <button style="background-color:red" class="bouton boutons">supprimer</button>

                </form>

                <form  action="/admin/recettes/{{$recipe->id}}" method="GET" class="bouton">
                    @csrf

                    <button style="background-color:lightseagreen" class="bouton boutons">voir</button>

                </form>

                <form method="GET" action="/admin/recettes/{{$recipe->id}}/edit" class="bouton">

                    <button style="background-color:lime" class="bouton boutons">éditer</button>

                </form>



                <hr class="mt-2">
            </article>


        @endforeach
    </div>

    </body>
@endsection
</html>



