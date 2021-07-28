<?php
  include_once 'PHP-IMDB-Grabber-master/imdb.class.php';  

  if (isset($_POST))
  {
    $imdb_title; $imdb_genre; $imdb_url; $imdb_poster;
    $tab = array();

    $tab0 = array(); $tab1 = array(); $tab2 = array(); $tab3 = array();

    $IMDB = new IMDB($_POST['my_title']);
   

    if ($IMDB->isReady) {

        foreach ($IMDB->getTitle($bForceLocal = false) as $aItem) {
            $tab0[] =  '<p>'.$aItem['name'].'</p>';
        }

        // foreach ($oIMDB->getGenre() as $bItem) {
        //     $tab1[] =  $bItem['value'];
        // }

        // foreach ($oIMDB->getUrl() as $cItem) {
        //     $tab2[] =  $cItem['value'];
        // }

        // foreach ($oIMDB->getPoster() as $dItem) {
        //     $tab3[] =  $dItem['value'];
        // }

        // $imdb_title = $IMDB->getTitle($bForceLocal = false);
        // $imdb_genre = $IMDB->getGenre();
        // $imdb_url = $IMDB->getUrl();
        // $imdb_poster = $IMDB->getPoster();
    }

    else
    {
        echo'non pret';
    }




    

    // On affiche les résultats :
    //if (!empty($imdb_title))
    if ($tab0.length > 0)
    { 

            //$tab[] = $tab0[]; //$imdb_title;
            // $tab[] = $imdb_genre;
            // $tab[] = "<a href='.$imdb_url.'>".$imdb_url."</a>";
            // $tab[] = "<img src=".$imdb_poster." width=400px />";
            echo json_encode($tab0);
    }

 else
    { 
      echo 'Oooops ça n\'a pas marché 😞';
    }






        
    
   
  }

// Bon, c'était surtout la référence à AJAX que j'avais oublié lol
  /*
  ON peut couper teamveiwer si tu veux ?
  oui si tu veux juste une derniere chose si je veux rajouter des lignes comme synopsis etc jai juste a ajouter de nouvelles variables?
  Il faut vérifier ce que raconte la classe
  daccord je vais faire une copie et essayer.
  l'exemple en dessous liste tout le contenu de ce qu'il est possible faire avec la classe
  oui sur le site ya vraiment toute les chose possible c'est vraiment top
  merci .
  Tu as du boulot. Je te laisse. Bon courage ! lol
  oh que oui jen ai mdr

cest que par exemple daredevil il sort la serie alors je cherhe le film
A ok.
Je pense que la classe retourne le 1er résultat trouvé
Peut-être faudrait-il énumérer tout ce qu'il trouve ?
jy ai pensé mais le soucis cest que j'ai besoin de ces infos la je te montre jusqua synopsys mais ce que j'ai du mal a comprendre avec cette api cest
que il te propose qu'un seul choix alors quil y a des films qui portent le meme nom
On va essayer de lister ce qu'il retrouve

Bon, je vais essayer de mon côté
Je te tiens au courant
La valeur envoyée est d'un format bizarre, qu'il faut donc traiter en conséquence
je vois jespere que j'ai pris la bonne api
Oui ça a l'air
C'est juste que je découvre aussi cette api



*/

    // $oIMDB = new IMDB('New York, I Love You');
    // if ($oIMDB->isReady) {
    //     echo '<h1>' . $oIMDB->getTitle() . '</h1>';
    //     foreach ($oIMDB->getAll() as $aItem) {
    //         if ($oIMDB::$sNotFound !== $aItem['value']) {
    //             echo '<p><b>' . $aItem['name'] . '</b>: ' . $aItem['value'] . '</p>';
    //         }
    //     }
    // } else {
    //     echo '<p>Movie not found!</p>';
    // }
?>