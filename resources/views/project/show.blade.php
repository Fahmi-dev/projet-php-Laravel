
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

@extends('layouts.main')

@section('content')
    <h2 class="title">{{ $recipe->title }}</h2>

    <div class="content">{{ $recipe->id }}</div>
    <div class="content">{{ $recipe->author_id }}</div>
    <div class="content">{{ $recipe->content }}</div>
    <div class="content">{{ $recipe->ingredients }}</div>
    <div class="content">{{ $recipe->url }}</div>
    <div class="content">{{ $recipe->date }}</div>
    <div class="content">{{ $recipe->status }}</div>

    <p>
        <a href="/project/{{ $recipe->id }}edit">Edit</a>
    </p>
@endsection

</body>
</html>
