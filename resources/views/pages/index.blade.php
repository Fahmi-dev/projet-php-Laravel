<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pagesRecettes.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pagesImages.css')}}">
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>
    <title>Index</title>
    <style>
        .bouton {
            display:inline-block;

        }
        .boutons {

            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
            line-height: 0.20em;
            height: 7px;
        }


        .bouttons {font-size: 13px;}
        #bouton{background-color:red; font-size:0.7em;padding-left: 3.5px;
            padding-right:2.5px;

        }
        #bouton:hover{
            background-color:black  ;

        }
        #hoverBouton:hover{background-color:black  ;}

    </style>

</head>
@extends('layouts.main')

@section('content')
    <body style="background:url('/images/liste.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;"

    >

    <!--FLASH MESSAGES JAVASCRIPT EN FONCTION DE LA VALEUR RETOURNée PAR CHAQUE SESSION DECLARéE-->
    @if(session_status() === PHP_SESSION_NONE)
        @php(session_start())

    @endif
    @if(isset($_SESSION['recetteAjoute'])&&!empty($_SESSION['recetteAjoute']))

        <script>
            swal({
                title: "Recette ajouté avec succès",
                text: "l'ajout de la nouvelle recette a été effectué!",
                icon: "success",
                button: "ok",
            });

        </script>
        @php(session_destroy())
    @endif
<!--FLASH MESSAGE POUR LA SUPPRESSION D'UNE RECETTE--->

    @if(session_status() === PHP_SESSION_NONE)
        @php(session_start())
    @endif
    @if(isset($_SESSION['supprumerUneRecette'])&&!empty($_SESSION['supprumerUneRecette']))

        <script>
            swal({
                title: "Suppression faite!",
                text: "La recette vient d'etre supprumé!",
                icon: "success",
                button: "ok",
            });

        </script>
        @php(session_destroy())
    @endif
    <!--FLASH MESSAGE POUR L'IMPORTATION D'UNE RECETTE--->
    @if(session_status() === PHP_SESSION_NONE)
    @php(session_start())
    @endif
    @if(isset($_SESSION['messagePhoto'])&&!empty($_SESSION['messagePhoto']))


        <script>
            swal({
                title: "Bravo!",
                text: "la photo importée avec succès!",
                icon: "success",
                button: "ok",
            });

        </script>
        @php(session_destroy())
    @endif


    <div  style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <h1 class="text-4xl font-bold mb-4">La liste des recettes</h1>

        <form method="GET" action="/admin/recettes/create" class="bouton">
            <button  style="width: 130% ;background-color: #298fe2; display: inline-block" class="bg-red-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">ajouter</button>
        </form>

        <hr class="mt-2">
        <hr class="mt-2">
        <br>
        @foreach($recipes as $recipe)
            <article class="mb-2">
                <div class="text-xl font-bold text-blue-500">{{ $recipe->title }}

                    @if((Auth::user()->id==11||Auth::user()->id==12))
                        <form  action="/adminPages/{{$recipe->id}}" method="GET" class="bouton">
                            @csrf
                            <button  id="bouton" class="bouton boutons" >gérer les commentaires</button>
                        </form>
                    @endif
                    <hr style="width:20%;text-align:left;margin-left:0">
                </div>




                <p class="text-md text-gray-600">{{ $recipe->content }}</p>

                <form action="/admin/recettes/{{$recipe->id}}" method="POST" class="bouton">
                    @csrf
                    @method('DELETE')

                    <button id="hoverBouton" style="background-color:#6b6b6b" class="bouton boutons">supprimer</button>

                </form>

                <form  action="/admin/recettes/{{$recipe->id}}" method="GET" class="bouton">
                    @csrf

                    <button id="hoverBouton" style="background-color:#6b6b6b" class="bouton boutons">commenter</button>

                </form>

                <form method="GET" action="/admin/recettes/{{$recipe->id}}/edit" class="bouton">

                    <button id="hoverBouton" style="background-color:#6b6b6b" class="bouton boutons">éditer</button>

                </form>


                <br><br><br>
                <form method="POST" enctype="multipart/form-data" action="/image/{{$recipe->id}}">
                    @csrf
                    @method('PATCH')

                    <input type="file" name="image" >
                    <button id="bouton"style="background-color:blue" class="bouton boutons">importer une photo</button>
                </form>

                @if($recipe->image_path!=null)
                    <br>
                    <div class="w-40 mb-8 shadow-xl">
                        <hr>
                        <div class="container">

                            <ul>
                                <li><a href="#img_1"><img  src="{{asset('images/'.$recipe->image_path)}}"></a></li>

                            </ul>

                            <a href="#_1" class="lightbox trans" id="img_1"><img  src="{{asset('images/'.$recipe->image_path)}}"></a>

                        </div>
                        <b style="color:#eb466b ">cliquer sur l'image pour l'agrandir</b>
                    </div>

                @endif
                <hr class="mt-2">
            </article>
        @endforeach
    </div>



    <!--DEBUT-->







    </body>
@endsection
</html>
