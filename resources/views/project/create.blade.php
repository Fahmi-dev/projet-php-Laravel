
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@extends('layouts.main')

@section('content')

    <h2>Créer un nouveau project</h2>

    <form method="POST" action="/project">
        @csrf
        <div>
            @error('id')
            <p style="color:red">{{$errors->first('id')}}</p>
            @enderror
            <input @error('id') style="border-color:red" @enderror type="text" name="id" placeholder="ID" value="{{old('id')}}">
        </div>
        <div>
            @error('author_id')
            <p style="color:red">{{$errors->first('author_id')}}</p>
            @enderror
            <input @error('author_id') style="border-color:red" @enderror type="text" name="author_id" placeholder="ID de l'auteur" value="{{old('author_id')}}">
        </div>

        <div>
            @error('title')
            <p style="color:red">{{$errors->first('title')}}</p>
            @enderror
            <input @error('title') style="border-color:red" @enderror type="text" name="title" placeholder="Titre du projet" value="{{old('title')}}">
        </div>
        <div>
            <textarea name="content" placeholder="Contenu"></textarea>
        </div>
        <div>
            <textarea name="ingredients" placeholder="Ingredients"></textarea>
        </div>
        <div>
            @error('url')
            <p style="color:red">{{$errors->first('url')}}</p>
            @enderror
            <input @error('url') style="border-color:red" @enderror type="text" name="url" placeholder="URL" value="{{old('url')}}">
        </div>
        <div>
            @error('date')
            <p style="color:red">{{$errors->first('date')}}</p>
            @enderror
            <input @error('date') style="border-color:red" @enderror type="date" name="date" placeholder="Date" value="{{old('date')}}">
        </div>
        <div>
            @error('status')
            <p style="color:red">{{$errors->first('status')}}</p>
            @enderror
            <input @error('status') style="border-color:red" @enderror type="text" name="status" placeholder="Status" value="{{old('status')}}">
        </div>
        <div>
            <button type="submit">Créer une recette</button>
        </div>
    </form>
@endsection

</body>
</html>
