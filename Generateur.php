<?php 
    session_start();
    $_SESSION['lastUrl'] = 'Generateur.php';
    $apikey = '84483b5fbf72908a4d3869434376a6ba'; 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--, shrink-to-fit=no-->

        <title>TMDB</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
        
        <link rel="stylesheet" type="text/css" href="css/style_colors.css" />        
        <link rel="stylesheet" type="text/css" href="css/style_tmdb.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

        <!-- FONTES -->
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

        <style>
            body                 { background-image:url(image/slider.png); background-size: cover; background-position: center; }
            #monFormulaire       { margin: 15px 0px; }
            .inputFormSaisie     { position: relative; width: 82%; background-color: rgb(232, 240, 254); }
            .inputFormButton     { position: relative; width: 100px; }
            #blocInputs          { margin: none; float: right; background-color: rgb(232, 240, 254)}
        </style>
    </head>

    <body>
        <?php include "header.php";  ?>

        <button id="changeDegrade" onclick="changeDegrade()" style="display: none; width: auto; height: auto; padding: 5px 8px;" >Changer</button>
        <a id="monDegrade" style="width: auto; color: white; background-color: rgb(50,50,50)";></a>

        <div class="container_fluid"> 
        
            <div class="container">  
                
                <div style="display: inline; width: 100%; float: right; margin-bottom: 10px;">
                    <form id="monFormulaire">
                        <div id="blocInputs">
                            <input type="text" id="mon_titre" class="inputFormSaisie"/>
                            <input type="submit" value="Rechercher" class="inputFormButton"/>
                        </div>
                    </form> 
                    <a id="viewActors" onclick="ShowModal_Actors()" style="display: none">voir les comédiens</a>
                </div>

                <div class="row" id="zone_media" style="display: none">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"  id="maliste" style="padding-right: 0px">   
                        <div id="liste" class="degrade03" style="display: block"></div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9"  id="lereste" style="padding-left: 5px">
                        <div id="resultats" class="degrade01">
                            <div class="row">
                                <div class="col-6" id="contenu"> 
                                    <div class="row" id="field_title">
                                        <div class="col-3"><a class="libelles" id="title" >Titre</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%";><a id="title_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_descr">
                                        <div class="col-3"><a class="libelles" id="description" >Description</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="description_value" class="fields degrade06" style="text-align: justify; float: left; line-height: 1em"></a></div></div>
                                    </div>

                                    <div class="row" id="field_synopsis">
                                        <div class="col-3"><a class="libelles" id="synopsis" >Synopsis</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="synopsis_value" class="fields degrade06" style="text-align: justify; float: left; line-height: 1em"></a></div></div>
                                    </div>

                                    <div class="row" id="field_genre">
                                        <div class="col-3"><a class="libelles" >Genre</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="genre_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>
                                        
                                    <div class="row" id="field_dateProd">
                                        <div class="col-3"><a class="libelles" >Année</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="date_prod_value" class="fields degrade06 padding2"></a></div></div>  
                                    </div>
                                        
                                    <div class="row" id="field_dateSortie">
                                        <div class="col-3"><a class="libelles" >Sortie</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="dates_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_director">
                                        <div class="col-3"><a class="libelles" >Réalisateur</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="director_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_budget">
                                        <div class="col-3"><a class="libelles" >Budget</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="budget_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_recette">
                                        <div class="col-3"><a class="libelles" >Recettes</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="recettes_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_pays">
                                        <div class="col-3"><a class="libelles" >Pays</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="pays_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_duree">
                                        <div class="col-3"><a class="libelles" >Durée</a></div>
                                        <div class="col-9"><div style="float: left; width: 100%"><a id="duree_value" class="fields degrade06 padding2"></a></div></div>
                                    </div>

                                    <div class="row" id="field_trailer">
                                        <a id="linkYT" hidden></a>
                                        <div class="col-3"><a class="libelles" id="titleBA" style="display: none; ">Trailer</a></div>
                                        <div class="col-9">
                                            <div id="zoneYT" style="float: left; margin-top: 6px; width: 100%"> 
                                                <div class="flex" id="flexYT" style="display: none; float: left; width: 100%; height: auto"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-3" id="field_acteurs">
                                    <div id="section_acteurs" style="float: right; max-height: 665px; margin-left: 1%; color: cyan; overflow-y: scroll; position: relative;">
                                        <div style="float: right; text-align: right; margin: 0% 10px 15px 0%;">
                                            <a id="acteurs" class="libelles" style="float: right">Acteurs</a>
                                            <a id="acteurs_value"></a>
                                        </div>                            
                                    </div> 
                                </div>  

                                <a id="poster_origin" hidden></a>  
                                <div class="col-3" id="affiche">                                                                      
                                    <a id="poster_value" style="float: right; width: 100%"></a>
                                    <label id="nomAffiche" class="fields degrade06" style="display: none; width: 100%; margin-top: 5px; text-align: center; color: orange"><label>                                       
                                </div>                                                    
                            </div>                            

                            <div class="row">
                                <div id="starPics" style="flex-shrink: inherit"></div>
                            </div>
                        </div>
 
                        <div id="newA">
                            <div class="row" id="newBloc">

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Hébergeur :</label>
                                        <input class="input_generateur" type="text" placeholder="Ex: Seedbox,Uptobox,etc..." name="Hebergeur" id="Hebergeur">
                                    </div>
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Nom de l'uploader :</label>
                                        <input class="input_generateur" type="text" placeholder="Ex: Hom3r" name="UploaderName" id="UploaderName">
                                    </div>
                                </div>                          

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Nom de la Release : </label>
                                        <input class="input_generateur" type="text" placeholder="Ex:Avatar.2010.MULTI.AC3.5.1.1080p.x265.Hom3r.mkv" name="ReleaseName" id="ReleaseName">
                                    </div>
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Nom de la Source : </label>
                                        <input class="input_generateur" type="text" placeholder="Ex: Avatar.2010.MULTI.Remux.Plop.mkv" name="SourceName" id="SourceName">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Qualité Vidéo :</label>
                                        <input class="input_generateur" list="QV" placeholder="Selectionner la Qualité" name="QualiteVideo" id="QualiteVideo">
                                        <datalist id="QV">
                                            <option value="Remux 4k"></option>
                                            <option value="Remux 1080p"></option>
                                            <option value="Bluray 4k"></option>
                                            <option value="Bluray 1080p"></option>
                                            <option value="Bluray 720p"></option>
                                            <option value="HD-LIGHT 4k"></option>
                                            <option value="HD-LIGHT 1080p"></option>
                                            <option value="HD-LIGHT 720p"></option>
                                            <option value="WEB-DL 4K"></option>
                                            <option value="WEB-DL 1080P"></option>
                                            <option value="WEB-DL 720P"></option>
                                            <option value="WEB-DL"></option>
                                            <option value="HD-TV 4k"></option>
                                            <option value="HD-TV 1080p"></option>
                                            <option value="HD-TV 720p"></option>
                                            <option value="HD-TV"></option>
                                            <option value="BD-RIP"></option>
                                            <option value="DVD-RIP"></option>
                                            <option value="DVD-R"></option>
                                            <option value="CAM"></option>
                                            <option value="TS"></option>
                                        </datalist>
                                    </div>
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Qualité Audio :</label>
                                        <input class="input_generateur" list="QA" placeholder="Selectionner la Qualité" name="QualiteAudio" id="QualiteAudio">
                                        <datalist id="QA">
                                            <option value="Dolby Digital 7.1"></option>
                                            <option value="Dolby Digital 5.1"></option>
                                            <option value="Dolby Digital 2.0"></option>
                                        </datalist>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Codec Vidéo :</label>
                                        <input class="input_generateur" list="CV" placeholder="Selectionner le Codec" name="CodecVideo" id="CodecVideo">
                                        <datalist id="CV">
                                            <option value="X265"></option>
                                            <option value="X264"></option>
                                            <option value="AVC"></option>
                                            <option value="MPEG"></option>
                                            <option value="MPEG-2"></option>
                                            <option value="MPEG-4"></option>
                                            <option value="XVID"></option>
                                            <option value="DIVIX"></option>
                                        </datalist>
                                    </div>

                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Codec Audio :</label>
                                        <input class="input_generateur" list="CA" placeholder="Selectionner le Codec" name="CodecAudio" id="CodecAudio">
                                        <datalist id="CA">
                                            <option value="HD-MASTER DTS"></option>
                                            <option value="HD-DTS"></option>
                                            <option value="DTS"></option>
                                            <option value="DTS ES"></option>
                                            <option value="DTS EXPRESS"></option>
                                            <option value="DOLBY TRUE HD"></option>
                                            <option value="DOLBY DIGITAL"></option>
                                            <option value="DOLBY DIGITAL EX"></option>
                                            <option value="DOLBY DIGITAL PLUS"></option>
                                            <option value="AC3"></option>
                                            <option value="AAC"></option>
                                            <option value="LPCM"></option>
                                            <option value="PCM"></option>
                                            <option value="FLAC"></option>
                                            <option value="MP3"></option>
                                            <option value="MP2"></option>
                                            <option value="WMA"></option>
                                            <option value="OGG"></option>
                                            <option value="WAV"></option>
                                        </datalist>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Langues :</label>
                                        <div class="parentCheckboxes">
                                            <div style="float: left; width: 50%">
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox1" data-group="langues" checked/><label for="myChkbox1" class="myLabels">Français</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox2" data-group="langues" /><label for="myChkbox2" class="myLabels">Français VFQ</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox3" data-group="langues" /><label for="myChkbox3" class="myLabels">Anglais</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox4" data-group="langues" /><label for="myChkbox4" class="myLabels">Espagnol</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox5" data-group="langues" /><label for="myChkbox5" class="myLabels">Italien</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox6" data-group="langues" /><label for="myChkbox6" class="myLabels">Portugais</label></div>
                                            </div>

                                            <div style="float: left; width: 50%">                                        
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox7" data-group="langues" /><label for="myChkbox7" class="myLabels">Allemand</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox8" data-group="langues" /><label for="myChkbox8" class="myLabels">Chinois</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox9" data-group="langues" /><label for="myChkbox9" class="myLabels">Japonais</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox10" data-group="langues" /><label for="myChkbox10" class="myLabels">Russe</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox11" data-group="langues" /><label for="myChkbox11" class="myLabels">Autre</label></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Sous-Titres :</label>
                                        <div class="parentCheckboxes">
                                            <div style="float: left; width: 50%">
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox12" data-group="sstitres" checked/><label for="myChkbox12" class="myLabels">Français</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox13" data-group="sstitres" /><label for="myChkbox13" class="myLabels">Français Forcé</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox14" data-group="sstitres" /><label for="myChkbox14" class="myLabels">Anglais</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox15" data-group="sstitres" /><label for="myChkbox15" class="myLabels">Espagnol</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox16" data-group="sstitres" /><label for="myChkbox16" class="myLabels">Italien</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox17" data-group="sstitres" /><label for="myChkbox17" class="myLabels">Portugais</label></div>
                                            </div>

                                            <div style="float: left; width: 50%"> 
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox18" data-group="sstitres" /><label for="myChkbox18" class="myLabels">Allemand</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox19" data-group="sstitres" /><label for="myChkbox19" class="myLabels">Chinois</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox20" data-group="sstitres" /><label for="myChkbox20" class="myLabels">Japonais</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox21" data-group="sstitres" /><label for="myChkbox21" class="myLabels">Russe</label></div>
                                                <div class="blocInputLabel"><input type="checkbox" name="myChkbox22" data-group="sstitres" /><label for="myChkbox22" class="myLabels">Autre</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Bitrate Vidéo : </label>
                                        <input class="input_generateur" type="text" placeholder="Ex: 5000 Kb/s" name="BitrateVideo" id="BitrateVideo">
                                    </div>

                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Bitrate Audio : </label>
                                        <input class="input_generateur" type="text" placeholder="Ex: 640 Kb/s" name="BitrateAudio" id="BitrateAudio">
                                    </div>
                                </div>                          

                                <div class="row">
                                    <div class="col-6">
                                        <label class="bouton_titre_generateur">Taille : </label>
                                        <input class="input_generateur" type="text" placeholder="Ex: 5,7 Go" name="MovieSize" id="MovieSize">
                                    </div>
                                </div>

                            </div> <!-- fin row : newBloc -->
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-12">
                                <button id="submit_prez" class="bouton_valider" type="submit" value="Bouton_envoyer">Valider</button>
                            </div>
                        </div>

                        <!-- RESULTAT DE LA GENERATION-------------------------------------------------------->
                        <div class="row" id="UserRequest" style="display: none; margin-top: 10px; border: 1px solid black;
                                                                 border-radius: 10px; padding: 30px; background-color: antiquewhite;
                                                                 background-image: url('image/bg32.jpg'); background-attachment: scroll;
                                                                 background-repeat: repeat; color: #fff">
                        </div>

                    </div>                    
                </div> 
            </div> 

        </div>        
    </body>

    <?php include "footer.php"; ?>
</html>

<!-- MODALE INFO --> 
<div id="Modal_Info">         
    <div class="info_modal">            
        <div class="info_header cadre_teinte3">
            <div id="info_title"><a>Information..</a></div>
            <div id="info_fermer">
                <img src="image/close0.png" onmouseover="src='image/close2.png'" onmouseout="src='image/close0.png'" width="20px" height="auto"/>
            </div>
        </div>                

        <div class="info_body cadre_teinte1">                            
            <p id="info_msg" name="info_msg" type="text" class="info_msg"></p>   
        </div>

        <div class="info_footer cadre_teinte3">
            <input type="button" id="close_modale" class="ModalBtnOK" value="J'ai compris" />
        </div>
    </div>
</div> 

<script src="index_films.js"></script>

<!-- Surveiller le changement de taille d'écran -->
<script>
    window.onload = function(e){ changeFooter(true); }

    $( window ).resize(function() {
        let LARGEUR = window.innerWidth;

        if(LARGEUR < 768) { responsiveSM(); }
        else
        {
            $('#maliste').css('display', 'block');
            document.getElementById('lereste').className = 'col-xl-9 col-lg-9 col-md-9 col-sm-9';

            if (LARGEUR < 992)  { responsiveMD(); }
            else 
            {
            responsiveLG();
            }
        }
    });

    function responsiveSM() {
        // Entre 576 et 768
        $('#maliste').css('display', 'none');
        document.getElementById('lereste').className = 'col-xl-12 col-lg-12 col-md-12 col-sm-12';
        $('#affiche').css('display', 'none');
        document.getElementById('contenu').className = 'col-12';
     }
    function responsiveMD() {
        // Entre 768 et 992
        $('#monTest').css('display', 'none');
        document.getElementById('contenu').className = 'col-7';                    
        document.getElementById('affiche').className = 'col-5';
        $('#affiche').css('display', 'block');
        $('#viewActors').css('display', 'block');
     }
    function responsiveLG() {
        // A partir de 992
        $('#monTest').css('display', 'block');
        document.getElementById('affiche').className = 'col-3';
        $('#viewActors').css('display', 'none');
    }

    /* MODIFS SUR FOOTER + DEGRADES DE COULEUR */
    function changeFooter(etat) {
        if (etat == true) { $('footer').css('position', 'absolute'); }
        else { $('footer').css('position', 'relative'); }
    }

    var tab_degrades = [];
    tab_degrades.push('Blue');
    tab_degrades.push('Green');
    var iDegrade = 0;

    function changeDegrade() {
        let lastValue = iDegrade;
        iDegrade++;
        if (iDegrade > tab_degrades.length) { iDegrade = 0; }
        document.getElementById('resultats').classList.remove(tab_degrades[lastValue]);
        document.getElementById('resultats').classList.add(tab_degrades[iDegrade]);
        $('#monDegrade').html(tab_degrades[iDegrade]);
    }
</script>

<!-- Visualisation présentation par l'utilisateur -->
<script>
    $('#submit_prez').on('click', function() {
        $('#UserRequest').html('');                       // Vider la visualisation à chaque demande de génération de présentation

        /* définis par l'api */
        let val_title = $('#title_value').html();           // OK
        let val_descr = $('#description_value').html();     // OK
        let val_affiche = '<img id="movieImage" src="' + $('#poster_origin').html() + '" width="50%" />|';
        
        let val_acteurs = getActors();
        let val_realisateur = $('#director_value').html();  // OK
        let val_anneeprod = $('#date_prod_value').html();   // OK
        let val_genres = $('#genre_value').html();          // OK                    // Pour l'instant, c'est en une seule ligne
        let val_origine = $('#pays_value').html();          // OK
        let val_dureefilm = $('#duree_value').html();       // OK
        let val_datesortie = $('#dates_value').html();      // OK
        let val_distrib = 'je sais pas';                    // PAS ENCORE TROUVE SUR L'API
        let val_synopsis = $('#synopsis_value').html();     // OK

        /* définis par l'utilisateur */
        let val_hebergeur = $('#Hebergeur').val();         // OK
        let val_uploadername = $('#UploaderName').val();   // OK
        let val_release = $('#ReleaseName').val();         // OK
        let val_sourcename = $('#SourceName').val();       // OK
        let val_videoQual = $('#QualiteVideo').val();      // OK
        let val_audioQual = $('#QualiteAudio').val();      // OK
        let val_videoCodec = $('#CodecVideo').val();       // OK
        let val_audioCodec = $('#CodecAudio').val();       // OK
        let val_langues = getLangues();                     // OK
        let val_sstitres = getSstitres();                   // OK
        let val_videoRate = $('#BitrateVideo').val();      // OK
        let val_audioRate = $('#BitrateAudio').val();      // OK
        let val_size = $('#MovieSize').val();              // OK


        $.ajax({  url:      "Generateur_Manuel_reponse.php",
                  type:     "POST",
                  data:     { Titre_Film:val_title, Description:val_descr, Affiche:val_affiche, Acteurs:val_acteurs, Realisateur:val_realisateur,
                              Annee_Prod:val_anneeprod, Genres:val_genres, Origine:val_origine, Duree_Film:val_dureefilm,
                              Date_Sortie:val_datesortie, Distributeur:val_distrib, Synopsis:val_synopsis, Hebergeur:val_hebergeur,
                              Nom_Uploader:val_uploadername, Nom_Release:val_release, Nom_Source:val_sourcename, Qualite_Video:val_videoQual,
                              Qualite_Audio:val_audioQual, Codec_Video:val_videoCodec, Codec_Audio:val_audioCodec, Langue:val_langues,
                              Sous_Titres:val_sstitres, Bitrate_Video:val_videoRate, Bitrate_Audio:val_audioRate, Taille:val_size },
                  dataType: "html",
                  cache:    false,
                  success:  function(data){   if (data != '') {   $('#UserRequest').css('display', 'block'); $('#UserRequest').html(data); }  }  
              });
    })

    function getActors() {
        var results = '';
        var nbChecked = 0;
        $('.actor_name').each(function() {                
            if (nbChecked < 6) // On ne recense que les 5 premiers acteurs trouvés
            { 
                nbChecked ++;
                if (nbChecked == 1) {results += this.innerHTML; } else { results += ', '+this.innerHTML; }
            }
        })
        return results;
     }
    function getLangues() {
        var results = '';
        var nbChecked = 0;
        $('input[type=checkbox]').each(function(){ if (this.dataset.group == 'langues') { if (this.checked)
             { 
                 nbChecked ++;
                 let myLabel = $(this).parent().children()[1].innerHTML;
                 if (nbChecked == 1) {results += myLabel; } else { results += ', '+myLabel; }
            } 
        } })
        return results;
     }
    function getSstitres() {
        var results = '';
        var nbChecked = 0;
        $('input[type=checkbox]').each(function(){ if (this.dataset.group == 'sstitres') { if (this.checked) 
            { 
                nbChecked ++;
                let myLabel = $(this).parent().children()[1].innerHTML;
                if (nbChecked == 1) {results += myLabel; } else { results += ', '+myLabel; }
            } 
        } })
        return results;
    }
</script>
