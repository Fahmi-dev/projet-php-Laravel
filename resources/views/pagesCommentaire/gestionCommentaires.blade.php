<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageCommentaire.css')}}">
    <style>
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
<body
    style="background:url('/images/commentaire.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;"
>
@extends('layouts/main')
@section('content')




    <!----------------------------------FORMULAIRE---------------------------->
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">


                    <!----------------------------------TEXTE BOUTON COMMENTER----------------->

                    <form method="POST" action="/commentaire/" class="bouton">
                        @csrf
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea name="contenu" style="height: 200px; width:820px;" placeholder="écrire un commentaire"></textarea>
                            </div>
                        </div>

                        <button style="background-color:dodgerblue" class="bouton boutons">commenter</button>

                        @php
                            //On ouvre une session pour recuperer l'id  de la recette et ensuite le passer au controlleur 'CommentaireController'
                            // pour l'enregistrer dans la table Comment

                                    session_start();

                                    $_SESSION['idRecetteCommente']=$recipe->id;
                        @endphp
                    </form>


                    @php($commentairesRecette=App\Models\Comment::where('recipe_id',$recipe->id)->get())
                    @php($nomAuteur=App\Models\User::where('id',$recipe->author_id)->get())

                    <h3 class="text-success">Commentaires</h3>
                    <!----------------------------------AFFICHAGE COMMENTAIRES------------------->


                    @foreach ( $commentairesRecette as $commentaire)

                        @php ($idUserCommentaire=App\Models\User::where('id',$commentaire->author_id)->value('id'))
                        @php( $idUserConnecte= Auth::user()->id)




                        <hr/>
                        <ul class="comments">
                            <li class="clearfix">
                                <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                                <div class="post-comments">
                                    <p class="meta">Date et heure:  {{$commentaire->created_at}} <br><a href="#">{{App\Models\User::where('id',$commentaire->author_id)->value('name')}}</a>
                                        a dit : <i class="pull-right"></i></p>
                                    <p>
                                        {{$commentaire->content}}
                                    </p>
                                </div>
                            </li>
                        </ul>

                        <!----------------------------------SUPPRESSION COMMENTAIRE------------------->
                        @if(  $idUserConnecte == $idUserCommentaire  )

                            <form action="/commentaire/{{$commentaire->id}}" method="POST" class="bouton">
                                @csrf
                                @method('DELETE')

                                <button style="background-color:red" class="bouton boutons">supprimer</button>

                            </form>
                            <!----------------------------------MODIFICATION COMMENTAIRE------------------->
                            <form action="/commentaire/{{$commentaire->id}}/edit" method="GET" class="bouton">
                                @csrf


                                <button style="background-color:blue" class="bouton boutons">éditer</button>

                            </form>
                        @elseif($idUserConnecte==11||$idUserConnecte==12 && $idUserCommentaire!=$idUserConnecte)
                            <form action="/commentaire/{{$commentaire->id}}" method="POST" class="bouton">
                                @csrf
                                @method('DELETE')

                                <button style="background-color:red" class="bouton boutons">supprimer</button>

                            </form>

                        @endif



                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

</body>
</html>
