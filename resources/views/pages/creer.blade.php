


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>

    <style>
        fieldset{
            width:250px;
        }
        .alert_danger{
            color: red;
            height: 50px;
            line-height: 0.25em;

        }

    </style>

</head>
@extends('layouts.main')

@section('content')
    <body style="background:url('/images/recettes2.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;">

    @if(session_status() === PHP_SESSION_NONE)
        @php(session_start())
    @endif

    @if(isset($_SESSION['recetteAjoute'])&&!empty($_SESSION['recetteAjoute']))

        @if($_SESSION['recetteAjoute']=='non')
            <script>
                swal({
                    title: "La clé existe déjà!",
                    text: "Une autre recette est identifiée avec la meme clé! L'Id doit etre unique.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Merci de choisir un ID unique", {
                                icon: "success",
                            });
                        } else {
                            swal("Merci de choisir un ID unique");
                        }
                    });
            </script>
        @php(session_destroy())
    @endif
@endif


    <div style="width: 500px; " class="container max-w-full mx-auto pt-4">
        <form  action="/admin/recettes" method="POST">
            @csrf

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="id">Identifiant de la recette </label>
                <input style="border-color: dodgerblue" value="{{old('id')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
            text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0"  name="id">
            </div>
            @error('id')
            <div class="alert_danger"> {{$message}}</div>
            @enderror

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="author_id">Identifiant de l'auteur  </label>
                <input style="border-color: dodgerblue" value="{{old('author_id')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full
            text-gray-600 text-sm focus:outline-none  focus:border-gray-400 focus:ring-0"  name="author_id">
            </div>
            @error('author_id')
            <div class="alert_danger"> {{$message}}</div>
            @enderror


            <div class="mb-4">
                <label class="font-bold text-gray-800" for="title">Titre </label>
                <input style="border-color: dodgerblue" value="{{old('title')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0"  name="title">
            </div>
            @error('title')
            <div class="alert_danger"> {{$message}}</div>
            @enderror


            <div class="mb-4">
                <label class="font-bold text-gray-800" for="content">Content </label>
                <textarea style="border-color: dodgerblue" class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0"  name="content">{{old('content')}}</textarea>
            </div>
            @error('content')
            <div class="alert_danger"> {{$message}}</div>
            @enderror

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="ingredients">Ingrédients </label>
                <textarea style="border-color: dodgerblue" class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0"  name="ingredients">{{old('ingredients')}}</textarea>
            </div>
            @error('ingredients')
            <div class="alert_danger"> {{$message}}</div>
            @enderror


            <div class="mb-4">
                <label class="font-bold text-gray-800" for="url">URL </label>
                <input style="border-color: dodgerblue" value="{{old('url')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0" name="url">
            </div>
            @error('url')
            <div class="alert_danger"> {{$message}}</div>
            @enderror


            <div class="mb-4">
                <label class="font-bold text-gray-800" for="date">Date </label>
                <input style="border-color: dodgerblue" value="{{old('date')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0" type="date"  name="date">
            </div>
            @error('date')
            <div class="alert_danger"> {{$message}}</div>
            @enderror

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="status">Statut </label>
                <input style="border-color: dodgerblue" value="{{old('status')}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none
            focus:border-gray-400 focus:ring-0"  name="status">
            </div>
            @error('status')
            <div class="alert_danger"> {{$message}}</div>
            @enderror

            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Créer</button>
            <a href="/admin/recettes" class="bg-blue-500 tracking-wide text-white px-12 py-1 inline-block mb-6 shadow-lg rounded hover:shadow">Annuler</a>
            <!--/posts-->
        </form>
    </div>
    </body>
@endsection
</html>
