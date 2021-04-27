<!DOCTYPE html>

<html>

<head>

    <link  rel="stylesheet" type="text/css" href="{{asset('css/pagesBackground.css')}}">
    <style>

        html{
            background-image:url({{url('images/background.jpg')}})

        }

        .boutons {
            display:inline-block;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
            line-height: 0.20em;
            height: 7px;
            background-color: black;
        }


    </style>

</head>
<body>



<form action="{{ route('login') }}">
    <button style="background-color:#ff6666" class=" boutons" >connexion</button>
</form>

<form action="{{ route('register') }}">
    <button style="background-color:#218BC3" class="boutons">inscription</button>
</form>


<div id="container">
    <header>
        <figcaption class="rellax" data-rellax-speed="1" style="color:#eb466b">RECETTES MASTER</figcaption>

    </header>

    <main>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
     </p>

        <p>
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
      </p>
    </main>
</div>
</body>
</html>
