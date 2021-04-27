
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@extends('layouts.main')

@section('content')

    @if (session('message'))
        <div>
            {{ session('message')}}
        </div>
    @endif

    <ul>
        @foreach ($recettes as $recette )
            <li><a href="/project/{{ $recette->id}}">{{ $recette->author_id }}</a></li>
            <li><a href="/project/{{ $recette->title}}">{{ $recette->content }}</a></li>
            <li><a href="/project/{{ $recette->ingredients}}">{{ $recette->url }}</a></li>
            <li><a href="/project/{{ $recette->date}}">{{ $recette->status }}</a></li>
        @endforeach
    </ul>

    <a href="/project/create">Créer une nouvelle recette</a>
@endsection

</body>
</html>
