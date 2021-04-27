@if(session_status() === PHP_SESSION_NONE)
    @php(session_start())
@endif
@if(isset($_SESSION['recetteAjoute'])&&!empty($_SESSION['recetteAjoute']))

    <script>
        swal({
            title: "Recette n'a pas été ajouté!!",
            text: "l' ID que vous avez chois existe déjà. !",
            icon: "error",
            button: "ok",
        });
    </script>
    @php(session_destroy())

@endif
