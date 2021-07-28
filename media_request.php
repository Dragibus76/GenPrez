<?php
    $apikey = '84483b5fbf72908a4d3869434376a6ba'; 

    include 'tmdb-api.php';
    $tmdb = new TMDB();
    $tab = array(); $tab0 = array();

    if (isset($_POST)) {
        // RECHERCHE PAR FILM (plusieurs résultats donnés)
        $movies = $tmdb->searchMovie($_POST['my_title']);

        foreach($movies as $movie){
            // $tab0 = '<a onclick=displayMedia('.$movie->getID().')>'.$movie->getTitle().'</a>'.'|';
            // //$tab0 .= '<a> (<i>'.$movie->getID().'</i>)</a>|';            
            // $tab[] = $tab0;

            $id = $movie->getID();
            $movie = $tmdb->getMovie($id);
            $jaquette = $tmdb->getImageURL('w400').$movie->getPoster();
            if ($jaquette != 'http://image.tmdb.org/t/p/w400') { $tab[] = $id.'¤'.$jaquette.'|'; }
            
        }
        echo json_encode($tab);
    }
?>