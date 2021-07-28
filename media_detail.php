<?php
    $apikey = '84483b5fbf72908a4d3869434376a6ba'; 

    include 'tmdb-api.php';
    $tmdb = new TMDB();
    $tab = array(); $tab0 = array();

    if (isset($_POST)) {
        // DETAIL DU FILM
        $movie = $tmdb->getMovie($_POST['referenceID']);
        $movie2 = file_get_contents("https://api.themoviedb.org/3/movie/".$_POST['referenceID']."?api_key=".$apikey."&append_to_response=release_dates"); 

        if ($movie->getTitle()) { $tab0 = 'title$'.$movie->getTitle().'</a>|'; } else { $tab0 = 'title$'.'-|';}
        if ($movie->getTagline()) { $tab0 .= 'description$'.$movie->getTagline().'</a>|'; } else { $tab0 .= 'description$'.'-|';}       
        if ($movie->getOverview()) { $tab0 .= 'synopsis$'.$movie->getOverview().'</a>|'; } else { $tab0 .= 'synopsis$'.'-|';}        

        /* ------------------------------------ GENRES --------------------------------- */
        $myGenres = '';
        $genres = $movie->getGenres();
        foreach ($genres as $genre) { $myGenres .= $genre->getName().' '; }
        if ($myGenres != '') { $tab0 .= 'genre$'.$myGenres.'|'; } else { $tab0 .= 'genre$'.'-|';} 
        

        /* -------------------------------- AFFICHE DU FILM ---------------------------- */
        if ($movie->getPoster()) 
        { 
            $tab0 .= 'posterStr$'.$tmdb->getImageURL('w400').$movie->getPoster().'|';
            $tab0 .= 'posterImg$<img id="movieImage" src="'.$tmdb->getImageURL('w400').$movie->getPoster().'" />|';
        } 
        else
        {
            $tab0 .= 'posterStr$-|'; $tab0 .= 'posterImg$-|';
        }


        /* ------------------------------------ ACTEURS -------------------------------- */
        $myActors = '';
        $cast = $movie->getCast();
        $nb = 0;
        foreach ($cast as $person) {            
            $entree = $person->getName();
            if  (strpos($myActors, $entree) === FALSE) {
                $nb++;
                $myPicture = '';
                if ($person->getProfile() != '')
                { 
                    $myPicture = '<img id="castperson'.$nb.'" class="cast" src="'.$tmdb->getImageURL('w185').$person->getProfile().
                                 '" style="width:80px;" onmouseover=displayActor("'.$nb.'") onmouseout=displayImgMovie() class=carousel__item />'; 
                }
                $myActors .= '<a id="cast'.$nb.'" class="actor_name">'.$person->getName()."</a><br />@".$myPicture.'€';
            }
        }
        if ($myActors != '') { $tab0 .= 'acteurs$'.$myActors.'|'; } else { $tab0 .= 'acteurs$'.'-|';} 


        /* ---------------------------- ANNEE DE PRODUCTION ----------------------------- */
        if ($movie->getRelease_date()) { $tab0 .= 'dateProd$'.date('d/m/Y', strtotime($movie->getRelease_date())).'|'; } else { $tab0 .= 'dateProd$'.'-|';}


        /* ------------------------- DATE DE SORTIE FRANCAISE --------------------------- */               
        $objMovie2 = json_decode($movie2, true);

        $myDateFR = ''; 
        $objMovie2 = $objMovie2["release_dates"]["results"];        
        foreach ($objMovie2 as $entree) {
            if ($entree['iso_3166_1'] === 'FR') { $myDateFR = date('d/m/Y', strtotime(substr($entree['release_dates'][0]['release_date'], 0, 10))); break; }            
        }
        if ($myDateFR != '') { $tab0 .= 'dateSortie$'.$myDateFR.'|'; } else { $tab0 .= 'dateSortie$'.'-|';} 


        /* ----------------------------- BUDGET & RECETTES ------------------------------- */  
        if ($movie->getBudget()) { $tab0 .= 'budget$'.number_format_rtrim($movie->getBudget(), 0, ',', ' ').'|'; } else { $tab0 .= 'budget$'.'-|';}
        if ($movie->getRevenue()) { $tab0 .= 'recette$'.number_format_rtrim($movie->getRevenue(), 0, ',', ' ').'|'; } else { $tab0 .= 'recette$'.'-|';}

        /* -------------------------------- REALISATEUR ---------------------------------- */  
        $myDir = '';
        $crew = $movie->getCrew();
        foreach ($crew as $person) {
            if ($person->getJob() === 'Director')
            {
                $myDir = $person->getName();
            }   
        }
        if ($myDir != '') { $tab0 .= 'realisateur$'.$myDir.'|'; } else { $tab0 .= 'realisateur$'.'-|';} 


        /* ---------------------------- PAYS DE PRODUCTION -------------------------------- */ 
        $objMovie2 = json_decode($movie2, true);
        $myProdCountries = '';
        $objMovie2 = $objMovie2["production_countries"];  
        foreach ($objMovie2 as $entree) {
            if ($entree['iso_3166_1']) { $myProdCountries .= $entree['iso_3166_1']; }            
        }
        if ($myProdCountries != '') { $tab0 .= 'pays$'.$myProdCountries.'|'; } else { $tab0 .= 'pays$'.'-|';} 


        /* ------------------------------- DUREE DU FILM ---------------------------------- */ 
        if ($movie->getRuntime()) { $tab0 .= 'duree$'.ConvertisseurTime($movie->getRuntime()*60).'|'; } else { $tab0 .= 'duree$'.'-|';}


        /* ------------------------------ BANDES-ANNONCES --------------------------------- */ 
        $myYT='';        
        if ($movie->getTrailers()) { 
            $objMovie4 = $movie->getTrailers(); 
            $objMovie4 = $objMovie4['youtube'];
            if (count($objMovie4) > 0) {
                $objMovie4 = $objMovie4[0]['source'];                            
                $myYT = "https://www.youtube.com/watch?v=".$objMovie4;
            }            
        }        
        if ($myYT != '') { $tab0 .= 'trailer$'.$myYT.'|'; } else { $tab0 .= 'trailer$'.'|';}  

        
        /* --------------------------------------------------------------------------------- */
        /* ------------------------------- RESULTAT FINAL ---------------------------------- */ 
        /* --------------------------------------------------------------------------------- */
        echo $tab0;
        /* --------------------------------------------------------------------------------- */
        /* --------------------------------------------------------------------------------- */
    }
    

    function number_format_rtrim($value,$maxdecimal=0,$decimalsing='.',$thousandsing=','){
        if (is_numeric($value)){
            $value=number_format($value,$maxdecimal,'.','');//to change input type to string
            $i=-1;
            if (strpos($value,'.'))while (substr($value,$i)==0){
                $i--;
                $maxdecimal--;
            }
            else $maxdecimal=0;
            return number_format($value,$maxdecimal,$decimalsing,$thousandsing);
        }
     }
    function ConvertisseurTime($Time){
        if($Time < 3600) { 
            $heures = 0;           
            if ($Time < 60) { $minutes = 0; } 
            else { $minutes = round($Time / 60); }           
            $secondes = floor($Time % 60); 
          } 
          else
          { 
            $heures = round($Time / 3600); 
            $secondes = round($Time % 3600); 
            $minutes = floor($secondes / 60); 
          }           
          $secondes2 = round($secondes % 60); 
         
          $TimeFinal = $heures."h".sprintf('%02d',$minutes); // $secondes2''"; 
          return $TimeFinal; 
       }
?>