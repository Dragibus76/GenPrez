<?php
    $apikey = '84483b5fbf72908a4d3869434376a6ba'; 

    include 'tmdb-api.php';
    $tmdb = new TMDB();
    $tab0 = array();

    if (isset($_POST)) {
        $serie = $_POST['numSerie'];        
        $movie = $tmdb->getMovie($_POST['referenceID']);

        /* ------------------------------------ ACTEURS -------------------------------- */
        $myActors = '';
        $cast = $movie->getCast();
        $nb = 0;
        foreach ($cast as $person) {           
            $entree = $person->getName();
            if  (strpos($myActors, $entree) === FALSE) {
                $nb++;
                // if ($nb<21)
                // { 
                    $myPicture = '';
                    // if ($person->getProfile() != '')
                    // { 
                    //     $myPicture = '<img id="castperson'.$nb.'" class="cast" src="'.$tmdb->getImageURL('w185').$person->getProfile().
                    //                  '" style="width:80px;" onmouseover=displayActor("'.$nb.'") onmouseout=displayImgMovie() class=carousel__item />'; 
                    // }
                    $myActors .= '<a id="castname'.$nb.'" class="castactor_name">'.$person->getName()."</a>|"; //<br />@".$myPicture.'€';
                // }
            }
        }
        if ($myActors != '') { echo $nb.'#'.$myActors; }

    }
?>