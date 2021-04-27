
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">



    <meta charset="utf-8">
    <title></title>
    <style>



        @import url('https://fonts.googleapis.com/css?family=Nunito+Sans|Playfair+Display:400,400i,700,700i,900,900i');

        * {
            box-sizing: border-box;
            border-radius: 5px;
        }

        body {
            margin: 0;
            background-color: #eee;
            background-image: url('https://source.unsplash.com/nGBbzS7Jj_0');
            background-size: cover;
        }

        main {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 100vw 100vw 100vw;
            width: 300vw;
            justify-content: center;
            align-items: center;
        }

        figure {
            max-width: 50vw;
            margin: 0 auto;
            background: rgba(255,255,255,0.8);
            padding: 2em;
            border: 1px solid #ddd;
            box-shadow: 0 0 2em -0.5em #aaa;
            position: relative;
        }

        figure img {
            max-width: 100%;
            max-height: 70vh;
        }

        figure figcaption {
            font-family: "Playfair Display";
            font-weight: 900;
            font-size: 3em;
            font-style: italic;
            text-align: right;
            text-shadow: 0 0 1em #555;
            text-shadow: 0 0 0.5em white;
            position: absolute;
            right: -2rem;
            bottom: -2rem;
        }

        .helper {
            position: absolute;
            top: 0;
            left: 0;
            margin: 1rem;
            text-align: center;
            font-family: 'Nunito Sans';
            opacity: .45;
            font-size: 1.2em;
            transition: opacity, .15s;
        }
        .helper:hover {
            opacity: 1;
        }

    </style>
</head>
<body style="background:url('/images/imageArrierePlan.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;

">

@extends('layouts.main')

@section('content')

             <h2 style="color: red"><b>Auteur de la recette:</b></h2><hr>


             <main>
                 <figure class="rellax">
                     <img
                         src="{{asset('images/imagesTroisRecettes/chef.jpg')}}">
                     <figcaption class="rellax" data-rellax-speed="1" style="color:red">{{App\Models\User::find($id_user)->name}}</figcaption>
                 </figure>
             </main>




@endsection

</body>
</html>
