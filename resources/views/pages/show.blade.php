<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Voir une recette</title>
    <style>
        fieldset{
            width:250px;
        }
        .alert_danger{
            color: red;
        }


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


        .bouttons {font-size: 10px;}


    </style>

</head>
<body>

@extends('layouts/main')
@section('content')


    <table>
        <tbody>
        <tr>
            <td><h5><b>Identifiant</b></h5></td>
            <td><h5><b>Titre</b></h5></td>
            <td><h5><b>Identifiant de l'auteur</b></h5></td>
            <td><h5><b>Ingrédients</b></h5></td>
            <td><h5><b>Contenu</b></h5></td>
            <td><h5><b>URL</b></h5></td>
            <td><h5><b>Date</b></h5></td>
            <td><h5><b>Statut</b></h5></td>
        </tr>


        <tr>
            <td>{{$recipe->id}}</td>
            <td>{{$recipe->title}}</td>
            <td>{{$recipe->author_id}}</td>
            <td>{{$recipe->ingredients}}</td>
            <td>{{$recipe->content}}</td>
            <td>{{$recipe->url}}</td>
            <td>{{$recipe->date}}</td>
            <td>{{$recipe->status}}</td>
        </tr>

        <form name="getRecipeId"></form>
        </tbody>
    </table>

<!---FAIT---------------------------------------------------->
    <form method="POST" action="/commentaire/" class="bouton">
        @csrf
        <div class="col-xs-12">
            <div class="form-group">
                <textarea name="contenu" style="height: 200px; width:500px;" placeholder="écrire un commentaire"></textarea>
            </div>
        </div>

        <button style="background-color:dodgerblue" class="bouton boutons">commenter</button>

        @php
            //On ouvre une session pour passer l'id  de la recette  au controlleur 'CommentaireController'et
            // pour l'enregistrer dans la table Comment
                    if(session_status() === PHP_SESSION_NONE){
       session_start();}

                    $_SESSION['idRecetteCommente']=$recipe->id;
        @endphp
    </form>

    <!---FAIT---------------------------------------------------->

    @php($commentairesRecette=App\Models\Comment::where('recipe_id',$recipe->id)->get())
    @php($nomAuteur=App\Models\User::where('id',$recipe->author_id)->get())

    @foreach ( $commentairesRecette as $commentaire)
        {{$commentaire->content}} : {{$commentaire->created_at}}: {{App\Models\User::where('id',$commentaire->author_id)->value('name')}}

        <form action="/commentaire/{{$commentaire->id}}" method="POST" class="bouton">
            @csrf
            @method('DELETE')

            <button style="background-color:red" class="bouton boutons">supprimer</button>

        </form>

        <form action="/commentaire/{{$commentaire->id}}/edit" method="GET" class="bouton">
            @csrf


            <button style="background-color:blue" class="bouton boutons">éditer</button>

        </form>

        <br>
    @endforeach


@endsection
</body>
