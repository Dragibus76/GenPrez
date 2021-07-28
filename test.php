<?php 
    session_start();
    $_SESSION['lastUrl'] = 'test.php';
    $apikey = '84483b5fbf72908a4d3869434376a6ba'; 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--, shrink-to-fit=no-->

        <title>Générateur</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">         -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap5.css" />     
        <link rel="stylesheet" type="text/css" href="css/style_colors.css" />        
        <!-- <link rel="stylesheet" type="text/css" href="css/style_tmdb.css" /> -->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/gen01.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

        <!-- FONTES -->
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        
    </head>

    <body>   
        <!-- Nouveau Concept -->
        <?php include "header.php";  ?>        

        <div id="main">
            <div id ="block_noir">
                <div class="container" style="min-height: 0">
                    <div class="row" >
                        <div style="display: inline; width: 100%; float: right; margin-bottom: 10px;">
                            <form id="monFormulaire">
                                <div id="blocInputs">
                                    <?php if ($_GET) { $rech = $_GET['title']; } else { $rech = ''; } ?>
                                    <input type="text" id="mon_titre" class="inputFormSaisie">
                                    <input type="submit" value="Rechercher" class="inputFormButton">                                
                                </div>
                            </form> 
                            <a id="viewActors" onclick="ShowModal_Actors()" style="display: none">voir les comédiens</a>
                        </div>
                    </div>

                    <div class="row" id="searchResult" style="display: none">
                        <div class="col-12">
                            <div class="resultat_recherche">
                                <p class="colorWhite">Résultat de la Recherche : </p>
                            </div>

                            <div class="row" style="margin-bottom: 10px">     
                                <div id="myFlex" style="display: flex; flex-direction: row; margin-top: 15px"></div>
                            </div>

                            <div class="Barre_de_Separation"></div>    <!-- Barre de separation -->
                        </div> 
                    </div>        

                    <div class="row" id="contentResult" style="display: none; padding-bottom: 10px;">
                        <div class="col-3" id="affiche">
                            <a id="poster_value" style="width: 100%"></a>
                        </div>
                        
                        <div class="col-9" style="margin-top: 10px">                            
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Titre</a></div>
                                <div class="col-9"><a id="title_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Sortie</a></div>
                                <div class="col-9"><a id="date_prod_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Genres</a></div>
                                <div class="col-9"><a id="genre_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Durée</a></div>
                                <div class="col-9"><a id="duree_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Date</a></div>
                                <div class="col-9"><a id="dates_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Réalisateur</a></div>
                                <div class="col-9"><a id="director_value" class="libelles colorGrey" ></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Description</a></div>
                                <div class="col-9"><a id="description_value" class="libelles colorGrey" style="text-align: justify; line-height: 1.3em;"></a></div>
                            </div>
                            <div class="row" >
                                <div class="col-3"><a class="libelles colorWhite titles">Synopsis</a></div>
                                <div class="col-9"><a id="synopsis_value" class="libelles colorGrey" ></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="min-height: 100%">
                <div id="resultats">
                    <!-- Section 2 -->
                    <div class="row" style="margin: 20px 0px;"> 
                        <div class="col-xl-3" id="">
                            <div id="section_acteurs" style="float: right; max-height: 665px; margin-left: 1%; color: cyan; overflow-y: scroll; position: relative;">
                                <div style="float: left; text-align: left; margin: 0% 10px 15px 0%;">
                                    <a id="acteurs" class="libelles titles colorBlack" style="float: left; width: 100%; ">Acteurs</a>
                                    <a id="acteurs_value"></a>
                                </div>                            
                            </div> 
                        </div>

                        <div class="col-xl-3"> 
                            <a class="libelles titles" style="width: 40%">Budget</a>
                            <a class="libelles" id="budget_value" style="width: 60%"></a>

                            <a class="libelles titles" style="width: 40%">Recette</a>
                            <a class="libelles" id="recettes_value" style="width: 60%"></a>

                            <a class="libelles titles" style="width: 40%">Pays d'origine</a>
                            <a class="libelles" id="pays_value" style="width: 60%"></a>
                        </div> 

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">  
                            <div class="row" id="field_trailer">
                                <a id="linkYT" hidden></a>
                                <div class="col-12">
                                    <a class="libelles titles" id="titleBA" style="display: none; ">Bande-annonce</a>
                                    <div id="zoneYT" style="float: left; margin-top: 6px; width: 100%"> 
                                        <div class="flex" id="flexYT" style="display: none; float: left; width: 100%; height: auto"></div>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                    </div>

                    <div class="row">
                        <div id="starPics" style="flex-shrink: inherit"></div>
                    </div>

                    <!-- </div>Section 3 -->                    
                    <div class="section_manuel" id="">   
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="bouton_titre_generateur">Hébergeur :</label>
                                    <input class="input_generateur"  type="text" placeholder="Ex: Seedbox,Uptobox,etc..." name="Hebergeur" id="Hebergeur">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
                                    <label class="bouton_titre_generateur" >Nom de l'uploader :</label>
                                    <input class="input_generateur"  type="text" placeholder="Ex: Hom3r" name="UploaderName" id="UploaderName">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="bouton_titre_generateur">Nom de la Release : </label>
                                    <input class="input_generateur" type="text" placeholder="Ex:Avatar.2010.MULTI.AC3.5.1.1080p.x265.Hom3r.mkv" name="ReleaseName" id="ReleaseName">
                                </div>
                            </div>
                        
                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
                                    <label class="bouton_titre_generateur">Nom de la Source : </label>
                                    <input class="input_generateur" type="text" placeholder="Ex: Avatar.2010.MULTI.Remux.Plop.mkv" name="SourceName" id="SourceName">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
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
                            </div>

                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
                                <label class="bouton_titre_generateur">Qualité Audio :</label>
                                        <input class="input_generateur" list="QA" placeholder="Selectionner la Qualité" name="QualiteAudio" id="QualiteAudio">
                                        <datalist id="QA">
                                            <option value="Dolby Digital 7.1"></option>
                                            <option value="Dolby Digital 5.1"></option>
                                            <option value="Dolby Digital 2.0"></option>
                                        </datalist></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
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
                            </div>

                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
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
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="bouton_titre_generateur" style="height:100%">Langues :</label>
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
                            </div>

                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
                                    <label class="bouton_titre_generateur" style="height:100%">Sous-Titres :</label>
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
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="bouton_titre_generateur">Bitrate Vidéo : </label>
                                    <input class="input_generateur" type="text" placeholder="Ex: 5000 Kb/s" name="BitrateVideo" id="BitrateVideo">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row" style="margin:0 1px;">
                                    <label class="bouton_titre_generateur">Bitrate Audio : </label>
                                    <input class="input_generateur" type="text" placeholder="Ex: 640 Kb/s" name="BitrateAudio" id="BitrateAudio">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="bouton_titre_generateur">Taille : </label>
                                    <input class="input_generateur" type="text" placeholder="Ex: 5,7 Go" name="MovieSize" id="MovieSize">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12" >
                                <button id="submit_Recherche" class="bouton_valider" style="border-radius:5px" type="submit" value="Bouton_envoyer">Valider</button>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4 -->                    
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xs-12" style="display: flex; justify-content: flex-end;">
                                <button id="" class="choix_banniere" style="border-radius:5px" type="submit" value="Bouton_envoyer">Choix de la Banniere</button>
                            </div>
                        </div>
                    </div>

                    <!-- PLEIN DE TRUCS A VIRER -->
                    <div style="display: none">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="Titre_prez">Les Gardiens de la</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <img src="image/titanic.jpg" style="margin-left: auto; margin-right: auto;display: flex;justify-content: center;border-radius:5px" width="25%"> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p id="mise_en_forme_prez">"Rien sur cette terre ne saurait les séparer" </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                            <img src="image/Set_01_Particular_Polygonal/Informations film.png" class="Bannieres" width="50%">
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Acteurs : </div>
                                <div style="margin:0 5px">Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Réalisateur : </div>
                                <div  style="margin:0 5px">James Cameron</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Année de production : </div>
                                <div  style="margin:0 5px">1997</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Genre : </div>
                                <div  style="margin:0 5px">Drame, Romance</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Origine : </div>
                                <div  style="margin:0 5px">Etats-unis</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Durée : </div>
                                <div  style="margin:0 5px">3h14min</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Date de sortie : </div>
                                <div  style="margin:0 5px">18/11/1997</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Distributeur : </div>
                                <div  style="margin:0 5px">?????????</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12" id="mise_en_forme_prez">
                            <img src="image/Set_01_Particular_Polygonal/Synopsis.png" class="Bannieres" width="50%">
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-8" id="mise_en_forme_prez" style="text-align:center">
                                <div>Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde,réputé pour son insubmersibilité, le « Titanic », appareille pour son 
                                    premier voyage. Quatre jours plus tard, il heurte un iceberg. À son bord, un artiste pauvre et une grande bourgeoise tombent amoureux. </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12" id="mise_en_forme_prez">
                            <img src="image/Set_01_Particular_Polygonal/Informations download.png" class="Bannieres" width="50%">
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Hébergeur : </div>
                                <div  style="margin:0 5px">Seedbox</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Nom de l'uploader : </div>
                                <div  style="margin:0 5px">Hom3r</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Nom de la Release : </div>
                                <div  style="margin:0 5px">Titanic.1997.1080p.x265.ac3.Hom3r.mkv</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Nom de la Source : </div>
                                <div  style="margin:0 5px"> Titanic.1997.1080p.remux-ZT.mkv</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">conteneur : </div>
                                <div  style="margin:0 5px">MKV</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Qualité vidéo : </div>
                                <div  style="margin:0 5px">x265</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Qualité audio : </div>
                                <div  style="margin:0 5px">AC3</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Langues : </div>
                                <div  style="margin:0 5px">Français, Français VFQ, Anglais</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Sous-titres : </div>
                                <div  style="margin:0 5px">Français, Français Forcé, Anglais</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Bitrate vidéo : </div>
                                <div  style="margin:0 5px">5000 Kb/s</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Bitrate audio : </div>
                                <div  style="margin:0 5px">640 Kb/s</div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12" id="mise_en_forme_prez">
                                <div  style="font-weight:700;;float:left">Taille : </div>
                                <div  style="margin:0 5px">5,2 Go</div>
                            </div>
                        </div>
                    </div>                    

                    <!-- RESULTAT DE LA GENERATION-------------------------------------------------------->    
                    <div id="UserRequest" class="module" style="display: block; border-radius: 10px; color: #000; margin-bottom: 20px;">
                    </div>

                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-12" id="mise_en_forme_prez">
                            <img src="image/Set_01/bannieregif.gif" class="Bannieres" width="50%">
                        </div>
                    </div>
                </div>            
            </div> 
        </div>    
        
        <?php include "footer.php"; ?>       
    </body>    

    
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

<script src="index_films2.js"></script>

<script type="text/javascript">
    // window.addEventListener("DOMContentLoaded", (event) => { 
    //     // function displayMedia() {
    //         //event.preventDefault();
    //         alert('je suis là');
    //         $('#starPics').html('');
    //         currentIDmedia = 597;

    //         $.ajax({  url:        'media_detail.php',
    //                 type:       'POST',
    //                 dataType:   'html',
    //                 cache:      false,
    //                 data:       { referenceID: currentIDmedia },
    //                 success:    function(data)   {  $('#resultats').css('display', 'block');
    //                                                 var elements = data.split('|');                                                    
    //                                                 for (let j=0; j < elements.length; j++)
    //                                                 {   
    //                                                     var item = elements[j].split('$');
    //                                                     if (item[0] == 'acteurs')   {  
    //                                                                                     var el = item[1].split('€'); 
    //                                                                                     for (let p=0; p < el.length; p++)
    //                                                                                     {
    //                                                                                         if (p < 6) {
    //                                                                                             var field = el[p].split('@');
    //                                                                                             $('#acteurs_value').append(field[0]);                       // Afficher le nom/prénom des comédiens
    //                                                                                             try { $('#starPics').append(field[1]); } catch (error) { }  // Afficher l'image si on peut lol
    //                                                                                         }
    //                                                                                     }  
    //                                                                                 } 
    //                                                 } 
    //                                             },
    //                 error:      function(data)   {  alert(data); }
    //             }); 

    //             // ajuster_PosterHeight();
    //             //setTimeout(() => { ajuster_listeActeurs();  }, 3000)  
    //     // }
    // })
</script>

<script type="text/javascript">

    // window.addEventListener("DOMContentLoaded", (event) => { 
    $(document).ready( function() {
        var searchtext = "<?php echo $rech; ?>";
        $('#mon_titre').val(searchtext);
        if (searchtext != '') { $('.inputFormButton')[0].click(); }
    })

    $('#submit_Recherche').on('click', function() {
        $('#UserRequest').html('');                       // Vider la visualisation à chaque demande de génération de présentation

        /* définis par l'api */
        let val_title = $('#title_value').html();           // OK
        let val_descr = $('#description_value').html();     // OK
        let val_affiche = '<img id="movieImage" src="' + $('#movieImage').attr('src') + '" width="50%" />|';
        
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