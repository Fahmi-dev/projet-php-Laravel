<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cooking | Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
    {{-- <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'> --}}



    <style>

    .bouton:hover{text-decoration-color: #eb466b }

</style>

</head>

<body>


<!-- Start Top Bar -->
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">Cooking</li>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/recettes">Liste de nos recettes</a></li>
            <li><a href="/contact">Contact</a></li>

<!--admin/recettes envoie des views différent en fonnction de use. L'onglet Aspace administrateur
apparait que dans le cas ou le user connecté est un administrateur. L'onglet gestion des recettes sera afficher
dans le cas ou le user n'est pas administrateur.-->
            @if (Auth::user()->id==11||Auth::user()->id==12)
                <li><a style="color: #eb466b" href="/admin/recettes">Espace Administrateur</a></li>


            @elseif(Auth::user()->id!=11||Auth::user()->id!=12)
                <li><a href="/admin/recettes">Gestion des recettes</a></li>
                @endif
        </ul>
    </div>


    <div >

        <table>
            <thread>
                <tr>
                    <th class="menu-text">
                        <form action="{{ route('profile.show')  }} " >
                            <button style="cursor: pointer; color: deepskyblue; " class="bouton">Voir votre profile</button>
                        </form>
                    </th>
                    <th>

                        <form method="POST" action="{{ route('logout') }} ">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}  "
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-jet-dropdown-link>
                        </form>

                    </th>
                </tr>
            </thread>
        </table>






    </div>


</div>
<!-- End Top Bar -->

<!---->
<div class="callout large primary">



    <div class="text-center">
        <h1>RECETTES MASTER</h1>
        <h2 class="subheader"><marquee direction="left" width="30%" >{{$titre_page}}</marquee></h2>
    </div>
</div>

<article class="grid-container">

    @yield('content')

</article>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
<script>
    $(document).foundation();
</script>

</body>
</html>
