
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>

       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Dernière recette</title>
       <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
       <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
       <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">
     <title></title>
   </head>
   <body >

     @extends('layouts.main')

     @section('content')

        <br>

         <table >
             <tbody style="background:url('/images/gateau.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;">
             <tr>
                 <td style="color: #eb466b"><h5><b>Recette</b></h5></td>
                 <td style="color: #eb466b"><h5><b>Auteur</b></h5></td>
                 <td style="color: #eb466b"><h5><b>Ingrédients</b></h5></td>
                 <td style="color: #eb466b"><h5><b>Contenu</b></h5></td>
             </tr>

       @foreach ($data_recettes as $recette)
       <tr>
           <td style="color: #218BC3"><b>{{$recette->title}}</b></td>
           <td>{{App\Models\User::find($recette->author_id)->name}}</td>
           <td>{{$recette->ingredients}}</td>
           <td>{{$recette->content}}</td>
       </tr>

       @endforeach
             </tbody>
         </table>


     @endsection

   </body>
 </html>
