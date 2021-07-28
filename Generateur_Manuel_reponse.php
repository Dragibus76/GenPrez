<style>
    #result img { margin-top: 20px; margin-bottom: 10px; }
</style>

<?php
    $reponse = '';
    $msgerror1 = "<strong style='color: red;'>! La case ";  $msgerror2 = " n'a pas été remplie !</strong>";

    if ($_POST)
    {
        $Titre_du_Film = $_POST['Titre_Film'];          $Description = $_POST['Description'];           $Affiche = $_POST['Affiche'];
        $Acteurs = $_POST['Acteurs'];                   $Realisateur = $_POST['Realisateur'];           $Annee_de_Production = $_POST['Annee_Prod'];
        $Genres = $_POST['Genres'];                     $Origine = $_POST['Origine'];                   $Duree_du_Film = $_POST['Duree_Film'];
        $Date_de_Sortie = $_POST['Date_Sortie'];        $Distributeur = $_POST['Distributeur'];         $Synopsis = $_POST['Synopsis'];
        $Hebergeur = $_POST['Hebergeur'];               $Nom_uploader = $_POST['Nom_Uploader'];         $Nom_de_la_Release = $_POST['Nom_Release'];
        $Nom_de_la_Source = $_POST['Nom_Source'];       $Qualite_Video = $_POST['Qualite_Video'];       $Qualite_Audio = $_POST['Qualite_Audio'];
        $Codec_Video = $_POST['Codec_Video'];           $Codec_Audio = $_POST['Codec_Audio'];           $Langue = $_POST['Langue'];
        $Sous_Titres = $_POST['Sous_Titres'];           $Bitrate_Video = $_POST['Bitrate_Video'];       $Bitrate_Audio = $_POST['Bitrate_Audio'];
                                                        $Taille = $_POST['Taille'];
        ?>
            <div id="result" style="text-align: center">
                <?php if (empty($Titre_du_Film)) { echo $msgerror1.'Titre'.$msgerror2; } else echo '<h1>'.$Titre_du_Film.'</h1>' ?><br />          

                <?php if (empty($Affiche)) { echo "<strong style='color: red;'>! Le lien de l\'affiche n\'a pas été inseré !</strong>"; } 
                      else echo "<div style='width:100%; text-align: center'>".$Affiche."</div>" ?><br />

                <u> <strong>Description :</strong></u><br />
                <?php if (empty($Description)) { echo $msgerror1.'Description'.$msgerror2; } else echo $Description ?><br />
                
                <img src="image/Set_01/informations_film.png" width="50%"><br />
                <!-- https://i.ibb.co/QYCh67H/INFORMATIONS-FILMS.png --> 

                <u><strong>Acteurs :</strong></u>
                <?php if (empty($Acteurs)) { echo $msgerror1.'Acteurs'.$msgerror2;  } else echo $Acteurs ?><br />
                
                <u><strong>Réalisateur :</strong></u>
                <?php if (empty($Realisateur)) { echo $msgerror1.'Réalisateur'.$msgerror2;  } else echo $Realisateur ?><br />

                <u><strong>Année de Production :</strong></u>
                <?php if (empty($Annee_de_Production)) { echo $msgerror1.'Année de production'.$msgerror2;  } else echo $Annee_de_Production ?><br />

                <u><strong>Genre :</strong></u>
                <?php if (empty($Genres))  { echo $msgerror1.'Genre'.$msgerror2;  }  else echo $Genres ?> <br />

                <u><strong>Origine :</strong></u>
                <?php if (empty($Origine)) { echo $msgerror1.'Origine'.$msgerror2;  } else echo $Origine ?><br />

                <u><strong>Durée du Film :</strong></u>
                <?php if (empty($Duree_du_Film)) { echo $msgerror1.'Durée du film'.$msgerror2;  } else echo $Duree_du_Film ?><br />
                
                <u><strong>Date de sortie :</strong></u>
                <?php if (empty($Date_de_Sortie)) { echo $msgerror1.'Date de sortie'.$msgerror2;  } else echo $Date_de_Sortie ?><br />
                
                <u><strong>Distributeur :</strong></u>
                <?php if (empty($Distributeur)) { echo $msgerror1.'Distributeur'.$msgerror2;  } else echo $Distributeur ?><br />
                    
                <img src="image/Set_01/synopsis.png" width="50%"><br />
                <!-- https://i.ibb.co/Qd9p94h/Synopsis.png --> 

                <u><strong>Synopsis :</strong></u>
                <?php if (empty($Synopsis)) { echo $msgerror1.'Synopsis'.$msgerror2;  } else echo $Synopsis ?><br />

                <img src="image/Set_01/informations_download.png" width="50%"><br />
                <!-- https://i.ibb.co/hCQyVgf/INFORMATIONS-DOWNLOAD.png --> 

                <u><strong>Hébergeur :</strong></u>
                <?php if (empty($Hebergeur)) { echo $msgerror1.'Hébergeur'.$msgerror2;  } else echo $Hebergeur ?><br />
                
                <u><strong>Nom de l'uploader:</strong></u>
                <?php if (empty($Nom_uploader)) { echo $msgerror1.'Nom de l\'uploader'.$msgerror2;  } else echo $Nom_uploader ?><br />

                <u><strong>Nom de la release :</strong></u>
                <?php if (empty($Nom_de_la_Release)) { echo $msgerror1.'Nom de la release'.$msgerror2;  } else echo $Nom_de_la_Release ?><br />

                <u><strong>Nom de la source :</strong></u>
                <?php if (empty($Nom_de_la_Source)) { echo $msgerror1.'Nom de la source'.$msgerror2;  } else echo $Nom_de_la_Source ?><br />

                <u><strong>Qualité vidéo :</strong></u>
                <?php if (empty($Qualite_Video)) { echo $msgerror1.'Qualité video'.$msgerror2;  } else echo $Qualite_Video ?><br />

                <u><strong>Qualité Audio :</strong></u>
                <?php if (empty($Qualite_Audio)) { echo $msgerror1.'Qualité audio'.$msgerror2;  } else echo $Qualite_Audio ?><br />

                <u><strong>codec vidéo :</strong></u>
                <?php if (empty($Codec_Video)) { echo $msgerror1.'Codec video'.$msgerror2;  } else echo $Codec_Video ?><br />

                <u><strong>codec Audio :</strong></u>
                <?php if (empty($Codec_Audio)) { echo $msgerror1.'Codec audio'.$msgerror2;  } else echo $Codec_Audio ?><br />

                <u><strong>Langues :</strong></u>
                <?php if (empty($Langue))  { echo $msgerror1.'Langues'.$msgerror2;  } else echo $Langue ?><br />

                <u><strong>Sous Titres :</strong></u>
                <?php if (empty($Sous_Titres))  { echo $msgerror1.'Sous-titres'.$msgerror2;  }   else echo $Sous_Titres ?><br />

                <u><strong>Bitrate vidéo :</strong></u>
                <?php if (empty($Bitrate_Video)) { echo $msgerror1.'Birate Video'.$msgerror2;  } else echo $Bitrate_Video ?><br />

                <u><strong>Bitrate audio :</strong></u>
                <?php if (empty($Bitrate_Audio)) { echo $msgerror1.'Bitrate audio'.$msgerror2;  } else echo $Bitrate_Audio ?><br />

                <u><strong>Taille :</strong></u>
                <?php if (empty($Taille)) { echo $msgerror1.'Taille'.$msgerror2; } else echo $Taille ?><br />
            </div>
        <?php

        $reponse = "<div id=\"result\"></div>";
    }
    else { $reponse = 'Aucune variable reçue'; }

    echo $reponse;
?>

<div style="width: 100%; text-align: center; margin: 20px 0px -40px 0px">
    <button class="bouton_generation" onclick="SelectText('myBBcode')">BBCODE</button>
    <button class="bouton_generation" onclick="SelectText('myHTML')">HTML</button>
</div>

<!--GENERATION DU BBCODE-->
<textarea id="myBBcode" class="generation" name="textpost1">
    [center][color=#ff0000]
    .::[ <?php echo $Titre_du_Film; ?>]::.[/color]
    [i]<?php echo $Description; ?>[/i]

    [img]<?php echo $Affiche; ?>[/img]

    [img]https://i.ibb.co/QYCh67H/INFORMATIONS-FILMS.png[/img]

    [font=Lucida Sans Unicode][color=#444444][u]Avec[/u] : [/color][/font] [i]<?php echo $Acteurs; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Réalisateur[/u] : [/color][/font] [i]<?php echo $Realisateur; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Année de Production[/u] : [/color][/font] [i]<?php echo $Annee_de_Production; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Genre[/u] : [/color][/font] [i]<?php echo $Genres; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Origine[/u] : [/color][/font] [i]<?php echo $Origine; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Durée[/u] : [/color][/font] [i]<?php echo $Duree_du_Film; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Date de sortie[/u] : [/color][/font] [i]<?php echo $Date_de_Sortie; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Distributeur[/u] : [/color][/font] [i]<?php echo $Distributeur; ?>[/i]

    [img]https://i.ibb.co/Qd9p94h/Synopsis.png[/img]

    [font=Lucida Sans Unicode][color=#444444]  [/color][/font] [i]<?php echo $Synopsis; ?>[/i]

    [img]https://i.ibb.co/hCQyVgf/INFORMATIONS-DOWNLOAD.png[/img]

    [font=Lucida Sans Unicode][color=#444444][u]Hébergeur[/u] : [/color][/font] [i]<?php echo $Hebergeur; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Nom Uploader[/u] : [/color][/font] [i]<?php echo $Nom_uploader; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Nom de la Release[/u] : [/color][/font] [i]<?php echo $Nom_de_la_Release; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Source[/u] : [/color][/font] [i]<?php echo $Nom_de_la_Source; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Qualité[/u] : [/color][/font] [i]<?php echo $Qualite_Video; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Qualité du son[/u] : [/color][/font] [i]<?php echo $Qualite_Audio; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Format d'encodage vidéo[/u] : [/color][/font] [i]<?php echo $Codec_Video; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Format d'encodage Audio[/u] : [/color][/font] [i]<?php echo $Codec_Audio; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Langue[/u] : [/color][/font] [i]<?php echo $Langue; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Sous-titre[/u] : [/color][/font] [i]<?php echo $Sous_Titres; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Bitrate vidéo[/u] : [/color][/font] [i]<?php echo $Bitrate_Video; ?>[/i]
    [font=Lucida Sans Unicode][color=#444444][u]Bitrate Audio[/u] : [/color][/font] [i]<?php echo $Bitrate_Audio; ?>[/i]
    [font=Lucida Sans Unicode][color=#ff0000][u]Taille[/u] : [/font][/color] [i][color=#ff0000]<?php echo $Taille; ?> [/color][/i]

    [img]https://i.ibb.co/7VkxMpL/SIGNATURE.png[/img][/center]
</textarea>

<!--GENERATION DU HTML-->
<textarea id="myHTML" class="generation" name="textpost2">  
    <h3 style="color:#FF0000";>.:[ <?php echo $Titre_du_Film; ?>]:.</h3>
    <h3 style="color:#444444";><i> <?php echo $Description; ?></i></h3>
    <img src="<?php echo $Affiche; ?>"><br>
    <img src="https://i.ibb.co/QYCh67H/INFORMATIONS-FILMS.png"><br>
    <h3 style="color:#444444";><u>Avec :</u> <i><?php echo $Acteurs; ?></i></h3>
    <h3 style="color:#444444";><u>Réalisateur :</u> <i><?php echo $Realisateur; ?></i></h3>
    <h3 style="color:#444444";><u>Année de Production :</u> <i><?php echo $Annee_de_Production; ?></i></h3>
    <h3 style="color:#444444";><u>Genre :</u> <i><?php echo $Genres; ?></i></h3>
    <h3 style="color:#444444";><u>Origine :</u> <i><?php echo $Origine; ?></i></h3>
    <h3 style="color:#444444";><u>Durée :</u> <i><?php echo $Duree_du_Film; ?></i></h3>
    <h3 style="color:#444444";><u>Date de sortie :</u> <i><?php echo $Date_de_Sortie; ?></i></h3>
    <h3 style="color:#444444";><u>Distributeur :</u> <i><?php echo $Distributeur; ?></i></h3>
    <img src="https://i.ibb.co/Qd9p94h/Synopsis.png">
    <h3 style="color:#444444";> <i><?php echo $Synopsis; ?></i></h3>
    <img src="https://i.ibb.co/hCQyVgf/INFORMATIONS-DOWNLOAD.png">
    <h3 style="color:#444444";><u>Hébergeur :</u> <i><?php echo $Hebergeur; ?></i></h3>
    <h3 style="color:#444444";><u>Nom Uploader :</u> <i><?php echo $Nom_de_Luploader; ?></i></h3>
    <h3 style="color:#444444";><u>Nom de la Release :</u> <i><?php echo $Nom_de_la_Release; ?></i></h3>
    <h3 style="color:#444444";><u>Source :</u> <i><?php echo $Nom_de_la_Source; ?></i></h3>
    <h3 style="color:#444444";><u>Qualité :</u> <i><?php echo $Qualité_Video; ?></i></h3>
    <h3 style="color:#444444";><u>Qualité du son :</u> <i><?php echo $Qualite_Audio; ?></i></h3>
    <h3 style="color:#444444";><u>Format d'encodage vidéo :</u> <i><?php echo $Codec_Video; ?></i></h3>
    <h3 style="color:#444444";><u>Format d'encodage Audio :</u> <i><?php echo $Codec_Audio; ?></i></h3>
    <h3 style="color:#444444";><u>Langue :</u> <i><?php echo $Langue; ?></i></h3>
    <h3 style="color:#444444";><u>Sous-titre :</u> <i><?php echo $Sous_Titres; ?></i></h3>
    <h3 style="color:#444444";><u>Bitrate Vidéo :</u> <i><?php echo $Bitrate_Video; ?></i></h3>
    <h3 style="color:#444444";><u>Bitrate Audio :</u> <i><?php echo $Bitrate_Audio; ?></i></h3>
    <h3 style="color:#444444";><u>Taille :</u> <i><?php echo $Taille; ?></i></h3>
    <img src="https://i.ibb.co/7VkxMpL/SIGNATURE.png">             
</textarea>




<script type="text/javascript">
    // Copier automatiquement le rendu 'BBCODE' ou 'HTML' au clic sur la bouton associé
    function SelectText(cible) {        
        const copyText = document.getElementById(cible);       
        copyText.select();        
        setTimeout(() => { document.execCommand('copy'); }, 3000);
        alert('le contenu est copié');
    }
</script>

    