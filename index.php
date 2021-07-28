<?php session_start();  $_SESSION['lastUrl'] = 'index.php'; ?>

<!doctype html>
<html>
    <head>
        <meta name="language" content="fr" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">

        <title>Accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <link href="css/style.css" type="text/css" rel="stylesheet" />
        <link href="css/header.css" type="text/css" rel="stylesheet" />

        <!-- FONTES -->
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">		
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php include "header.php";  ?>
        
        <div id="main">
            <div id="home"> 
                <form id="monFormulaire" style="display: table-cell; vertical-align: middle;">
                    <div id="blocInputs">
                        <input type="text" id="mon_titre" class="inputFormSaisie"/>
                        <input type="submit" value="Rechercher un film" class="inputFormButton"/>
                    </div>
                </form> 
            </div>
        </div>

        <div id="content" style="width: 100%">
            <div class="bloc_accueil"> 
                <h1 class="myH2">Bienvenue sur GenPrez.fr</h1>
                    <p class="texte_bloc_accueil">          
                        Genprez.fr est un générateur créé pour vous! <br>
                        Il a été créé dans le but de gagner du temps dans vos présentations, adaptable aux besoins de tous avec
                        Une présentation originale .
            </div>
            <div class="bloc_accueil"> 
                <h3 class="H2_bloc_accueil">Pourquoi s'inscrire sur Genprez.fr?</h3>
                    <p class="texte_bloc_accueil">                
                        -Un accès au forum.<br>
                        -La possibilité d'ajouter vos propres bannières dans vos présentations.<br>
                        -Un accès a votre profil pour y ajouter votre avatar.
            </div>
            <div class="bloc_accueil"> 
                <h3 class="H2_bloc_accueil">Plus d'informations ?</h3>
                    <p class="texte_bloc_accueil">                
                        Consulter la rubrique #Forum du site .<br>
                        Elle a été mise en place pour répondre à toutes vos questions.
            </div>

            <h3 class="H2_bloc_accueil">API</h3>
            <div class="logo_tmdb">
                <img src="https://i.ibb.co/X3KYG2J/blue-long-2-9665a76b1ae401a510ec1e0ca40ddcb3b0cfe45f1d51b77a308fea0845885648.png" width="100%">
            </div>
        </div>

    </body>  

    <?php include "footer.php"; ?>
</html>

<script type="text/javascript">
    $('#monFormulaire').on('submit', function() {
        event.preventDefault();
        var selectedTitle = $('#mon_titre').val();
        window.location.href = 'test.php?title='+selectedTitle;
        
        //window.location.href = "test.php";
    })
</script>