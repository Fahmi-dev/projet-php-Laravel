<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Contact</title>

    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageCommentaire.css')}}">
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>
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
<body style="background:url('/images/comment.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;

">
@extends('layouts/main')
@section('content')

    @if(session_status() === PHP_SESSION_NONE)
    @php(session_start())
    @endif
    @if(isset($_SESSION['supprimer'])&&!empty($_SESSION['supprimer']))
        <script>
            swal({
                title: "Suppression",
                text: "la suppression a été effectué avec succès!",
                icon: "success",
                button: "ok",
            });

        </script>
        @php(session_destroy())
    @endif




    <!----------------------------------FORMULAIRE---------------------------->
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">


                    <!----------------------------------TEXTE BOUTON COMMENTER----------------->




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

                            <form action="/adminPages/{{$commentaire->id}}" method="POST" class="bouton">
                                @csrf
                                @method('DELETE')

                                <button style="background-color:red" class="bouton boutons">supprimer</button>

                            </form>
                            <!----------------------------------MODIFICATION COMMENTAIRE------------------->

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
