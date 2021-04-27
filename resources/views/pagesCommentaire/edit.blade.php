
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer une recette</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .alert_danger{
            color: red;
        }
    </style>

</head>
<body style="border-radius: 1em;">
@extends('layouts.main')

@section('content')



    @if(session_status() === PHP_SESSION_NONE)
        @php(session_start())
    @endif
    @if(isset($_SESSION[''])&&!empty($_SESSION['flashMessagePhoto']))


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







    <div  class="container max-w-full mx-auto pt-4" style="width: 300px; margin-left: 150px;">
        <form method="POST" action="/commentaire/{{$id}}" >
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="content">Contenu </label>
                <textarea  style="height: 150px;" rows="80" class="h-16 bg-white border border-gray-300  py-4 px-3 mr-4 w-full text-gray-600
            text-sm focus:outline-none focus:border-gray-400 focus:ring-0"  name="contenu">{{$commentaire}}</textarea>
            </div>
            @error('contenu')
            <div class="alert_danger"> {{$message}}</div>
            @enderror


            <button class="bg-green-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg  hover:shadow">modifier</button>
        </form>
        <form method="GET" action="/commentaire/{{$id}}">
            @csrf
            <button class="bg-gray-500 tracking-wide text-white px-6 py-2  mb-6 shadow-lg  hover:shadow">annuler</button>
        </form>
    </div>
</body>
@endsection
</html>
