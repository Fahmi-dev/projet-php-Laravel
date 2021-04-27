<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pagesRecettes.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pagesImages.css')}}">
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>

  <link  rel="stylesheet" type="text/css" href="{{asset('css/imageGeneral.css')}}">



    <meta charset="utf-8">
    <title>Accueil</title>
    <style>


        /*  img {
              /* display: block;
               margin-left: auto;
               margin-right: auto;
               width: 50%;

              border: 1px solid #ddd;
              border-radius: 4px;
              padding: 5px;
              width: 200px;

          }*/
        .text{



            width: 500px;
            height: 0px;


            position: absolute;





        }

    </style>
</head>


<body style="background:url('/images/gateau.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;

">

@extends('layouts/main')
@section('content')

    @if(session_status() === PHP_SESSION_NONE)
        @php(session_start())
    @endif
    @if(isset($_SESSION['flashMessagePhoto'])&&!empty($_SESSION['flashMessagePhoto']))


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


    <label style="color: #eb466b"><h1>Nos 3 dernières recettes</h1>
    </label>
    <div class="aligner">
        <div class="text" style="color:blue; font-size: 1.2em"><b>les photos à droite sont cliquables. Cliquer sur les photos pour les agrandir et voir mieux les recettes.</b></div>
        <table>
            @foreach ( $troisDernieresRecettes as $recette)
                <tr>
                    <ul class="tilesWrap">
                        <li>
                            <h2>{{$recette->id}}</h2>
                            <h3>{{$recette->title}}</h3>
                            <p>
                                {{$recette->content}}
                            </p>
                            <hr>
                            <br><br>
                            <form method="GET" action="/recettes/{{$recette->url}}">
                                <button>
                                    Voir auteur
                                </button>
                                <br><br>
                            </form>

                            <form method="POST" enctype="multipart/form-data" action="/imageRecettes/{{$recette->id}}">
                                @csrf
                                @method('PATCH')

                                <input  type="file" name="image" >
                                <br><br><br>
                                <button>Valider l'importation</button>
                            </form>
                            <br>
                            <div class="w-40 mb-8 shadow-xl">
                                <hr>
                                <br>
                                @if($recette->image_path!=null ))
                                <img
                                    src="{{asset('images/'.$recette->image_path)}}">
                                    @endif
                            </div>
                        </li>
                    </ul>
                </tr>
            @endforeach
        </table>

        <th>
            <div class="container">
                <div class="top">
                    <ul>
                        <li><a href="#img_1"><img src="{{ URL::to('images/imagesTroisRecettes/rec1img1.jpg') }}"></a></li>
                        <li><a href="#img_2"><img src="{{ URL::to('images/imagesTroisRecettes/rec1img2.jpg') }}"></a></li>
                        <hr width="0px">
                        <li><a href="#img_3"><img src="{{ URL::to('images/imagesTroisRecettes/rec2img1.jpg') }}"></a></li>
                        <li><a href="#img_4"><img src="{{ URL::to('images/imagesTroisRecettes/rec2img2.jpg') }}"></a></li>
                        <hr width="0px">
                        <li><a href="#img_5"><img src="{{ URL::to('images/imagesTroisRecettes/rec3img1.jpeg') }}"></a></li>
                        <li><a href="#img_6"><img src="{{ URL::to('images/imagesTroisRecettes/rec3img2.jpeg') }}"></a></li>
                        <br>
                    </ul>

                    <a href="#_1" class="lightbox trans" id="img_1"><img src="{{ URL::to('images/imagesTroisRecettes/rec1img1.jpg') }}"></a>
                    <a href="#_2" class="lightbox trans" id="img_2"><img src="{{ URL::to('images/imagesTroisRecettes/rec1img2.jpg') }}"></a>
                    <a href="#_3" class="lightbox trans" id="img_3"><img src="{{ URL::to('images/imagesTroisRecettes/rec2img1.jpg') }}"></a>
                    <a href="#_4" class="lightbox trans" id="img_4"><img src="{{ URL::to('images/imagesTroisRecettes/rec2img2.jpg') }}"></a>
                    <a href="#_5" class="lightbox trans" id="img_5"><img src="{{ URL::to('images/imagesTroisRecettes/rec3img1.jpeg') }}"></a>
                    <a href="#_6" class="lightbox trans" id="img_6"><img src="{{ URL::to('images/imagesTroisRecettes/rec3img2.jpeg') }}"></a>
                </div>
            </div>
        </th>

    </div>

@endsection

</body>
</html>

