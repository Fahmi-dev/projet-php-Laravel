<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link  rel="stylesheet" type="text/css" href="{{asset('css/pageContact.css')}}">

    <meta charset="utf-8"> <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script type="text/javascript" src=" {{URL::asset('js/script.js')}}"></script>
    <title>Contact</title>
    <style>
        .alert_danger{
            color: red;
        }
    </style>
</head>
<body style="background:url('/images/contact2.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;" >


@if(session_status() === PHP_SESSION_NONE)
    @php(session_start())
@endif

<!--On s'assure que la valeur retourné par la session n'est pas vide.-->
@if(isset($_SESSION['flashMessageEnregistrement'])&&!empty($_SESSION['flashMessageEnregistrement']))
    <script>
        swal({
            title: "Demande de contact envoyé !"+"\n",
            text: "les informations de la demande de contact ont été enregistré avec succès:"+"\n"+
                "\n"+"- {{ (session()->get( 'nom'))}}"+ "\n"+
                "- {{session()->get( 'mail')}}"+"\n"+
                "- {{session()->get( 'message')}}"+"\n"+
                "- Date et heure d'enregistrement: "
                +"{{session()->get( 'date')}}"+"\n"+
                "\n"+"la liste complète des demandes de contact effectuées en dessous du formulaire.",

            icon: "success",
            button: "ok",
        });
    </script>

@endif
<!--On détruit la session -->
@php(session_destroy())



@extends('layouts.main')
@section('content')
    <div class="background">
        <div class="container">
            <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                        <div class="screen-header-button maximize"></div>
                        <div class="screen-header-button minimize"></div>
                    </div>
                    <div class="screen-header-right">
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                    </div>
                </div>
                <div class="screen-body">
                    <div class="screen-body-item left">
                        <div class="app-title">
                            <span>FORMULAIRE</span>
                            <span>DU CONTACT</span>
                        </div>
                        <div class="app-contact">Nous vous offrons les meilleurs recettes du monde </div>
                    </div>




                    <div class="screen-body-item">
                        <div class="app-form">

                            <form action="/contact/enregistrer" method="POST">
                                @csrf

                                <div class="app-form-group">
                                    <input value="{{old('nom')}}" type="text" name="nom"  placeholder="Nom">
                                    @error('nom')
                                    <div class="alert_danger"> {{$message}}</div>
                                    @enderror
                                </div>

                                <div class="app-form-group">
                                    <input  value="{{old('mail')}}" type="email" name="mail"  placeholder="E-mail">
                                    @error('mail')
                                    <div class="alert_danger"> {{$message}}</div>
                                    @enderror
                                </div>

                                <div class="app-form-group message">
                                    <textarea value="{{old('message')}}" type="text" name="message" placeholder="Message" style="height: 150px;"></textarea>
                                    @error('message')
                                    <div class="alert_danger"> {{$message}}</div>
                                    @enderror
                                </div>
                                <div class="app-form-group buttons">
                                    <input class="app-form-button" type="submit" name="enregistrer " value="ENVOYER">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <h4 style="color: #eb466b; background-color: #1a202c;width: 700px"> La liste de toutes les demandes de contact effectuées</h4> <br>
    @php($contacts=App\Models\Contact::all())
    @if(! $contacts->isEmpty())
        @foreach(\App\Models\Contact::all() as $contact)
            <article class="mb-2">

                <div class="text-xl font-bold text-blue-500" style="background-color: navajowhite; width: 450px">
                    Demande de contact émise par {{ $contact->name }}
                </div>
                <p class="text-md text-gray-600" style="background-color: navajowhite; width: 450px">{{ $contact->message }}<br><br><br>
                    E-mail : {{ $contact->email }} <br>
                    Date : {{ $contact->date }}.</p>
            </article>
            <hr class="mt-2">
        @endforeach
    @endif


@endsection

</body>
</html>
