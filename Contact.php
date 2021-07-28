<?php session_start(); $_SESSION['lastUrl'] = 'Contact.php'; ?>

<!doctype html>
<html>
    <head>    
        <title>Accueil</title>

        <meta name="language" content="fr" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">        
        
        
        <link href="css/header.css" type="text/css" rel="stylesheet" />
        <link href="css/jeremie.css" type="text/css" rel="stylesheet" />
        <link href="css/style.css" type="text/css" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

        <style>
            footer { position: absolute; margin-top: 0px; }  /* Footer surclassé 'uniquement' pour cette page ! */
        </style>
    </head>

    <body>
        <?php include "header.php"; ?>

        <div class="container-fluid">
            
            <div id="fond_contact">
                <div id="bloc_contact">
                    <form action="" method="post">
                        
                        <h1>Contact</h1>
                        <p class="paragraphe_contact">Veuillez remplir le formulaire de contact</p>
                        <label for="">Pseudo :</label>
                        <input class="Pseudo" type="text" id="Pseudo" name="">
                        
                        <label for="">Email :</label>
                        <input class="Pseudo" type="text" id="Pseudo" name="">                            

                        <label for="">Message :</label>
                        <input class="Message" type="text" id="Pseudo" name="">  
                        
                        <input class="Bouton_contact" type="submit"></input>
                        
                    </form>
                </div>                         
            </div>

            <?php include "footer.php"; ?>
        </div>
        
    </body> 
    

</html>









