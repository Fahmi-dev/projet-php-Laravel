<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>
    <meta charset="utf-8">
    <title></title>
    <style>
        .couleurValidation{
            color: lightseagreen;
        }
    </style>
</head>
<body>

@extends('layouts.main')

@section('content')

@php echo "$d";
echo "$d==null";
echo $d=="";

@endphp
 <div class="couleurValidation"> Les informations ci-dessous sont enrgistrées avec succès: </div>

   @foreach ($infosContactEnregistrees as $data)
    <li>{{$data}}</li>
   @endforeach


    <script>
        swal({
            title: "Enregistrement",
            text: "le contact enregistré avec succès!",
            icon: "success",
            button: "ok",
        });
    </script>



@endsection

</body>
</html>
