<!doctype html>
<html>
  <head>
      <meta name="viewport" charset="utf-8"content="width=device-width" />
      <title>Generateur manuel</title>
      <link href="css/style.css" type="text/css" rel="stylesheet" />
      <link href="css/header.css" type="text/css" rel="stylesheet" />

      <?php include_once "header.php"; ?>
      <?php include_once "Menus.php"; ?>
  </head>

  <body>
    
    <div class="Mise_en_forme">
        <section class="Encadrement">

        <!--CONTENU---------------------------------------------------------------------------------------------------------------------------------------------------------------->
          <h2 id="Generateur_manuel"> Générateur Manuel</h2>
            <p class="avertisement_inscription">Vous pouvez ajouter vos bannieres perso en vous inscrivant!</p>
              <table>
                <form action="Generateur_Manuel_reponse.php" method="GET">
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Titre du Film : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Avatar" name="Titre_du_Film" id="Titre_du_Film">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Bref Description : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 1080p HdLight" name="Description" id="Description">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Lien de L'affiche : </label>
                </td>
                <td>
                  <input class="input_generateur" type="url" placeholder="www.GenPrez.fr/nomdelaffiche.png" name="Affiche" id="Affiche">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Acteurs :</label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Tom Hawks, Angelina Jolie" name="Acteurs" id="Acteurs">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Réalisateur :</label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Steven Spielberg" name="Réalisateur" id="Réalisateur">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Année de Production : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 2012" name="Année_de_Production" id="Année_de_Production">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Genre : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Genre" placeholder="Selectionner le Genre" name="Genre" id="browser" >
                    <datalist id="Genre">
                      <option value="Action"></option>
                      <option value="Aventure"></option>
                      <option value="Comédie"></option>
                      <option value="Fantastique"></option>
                      <option value="Thriller"></option>
                      <option value="Horreur"></option>
                      <option value="Science-Fiction"></option>
                      <option value="Dramatique"></option>
                      <option value="Animation"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Genre 2 : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Genre2" placeholder="Selectionner le Genre" name="Genre2" id="browser" >
                    <datalist id="Genre2">
                      <option value="Action"></option>
                      <option value="Aventure"></option>
                      <option value="Comédie"></option>
                      <option value="Fantastique"></option>
                      <option value="Thriller"></option>
                      <option value="Horreur"></option>
                      <option value="Science-Fiction"></option>
                      <option value="Dramatique"></option>
                      <option value="Animation"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Genre 3 : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Genre3" placeholder="Selectionner le Genre" name="Genre3" id="browser" >
                    <datalist id="Genre3">
                      <option value="Action"></option>
                      <option value="Aventure"></option>
                      <option value="Comédie"></option>
                      <option value="Fantastique"></option>
                      <option value="Thriller"></option>
                      <option value="Horreur"></option>
                      <option value="Science-Fiction"></option>
                      <option value="Dramatique"></option>
                      <option value="Animation"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Origine du Film : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: U.S.A" name="Origine" id="Origine">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Durée du Film : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 1h27min" name="Durée_du_Film" id="Durée_du_Film">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Date de sortie du Film : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 12 Mars 2001" name="Date_de_Sortie" id="Date_de_Sortie">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Distributeur : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Sony Pictures France" name="Distributeur" id="Distributeur">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Synopsys : </label>
                </td>
                <td>
                  <input class="textarea" type="textarea" placeholder="Ex: Coller ici le synopsis du film..." name="Synopsis" id="Synopsis">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Hébergeur : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Seedbox,Uptobox,etc..." name="Hebergeur" id="Hebergeur">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Nom de L'uploader : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Hom3r" name="Nom_de_Luploader" id="Nom_de_Luploader">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Nom de la Release : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex:Avatar.2010.MULTI.AC3.5.1.1080p.x265.Hom3r.mkv" name="Nom_de_la_Release" id="Nom_de_la_Release">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Nom de la Source : </label> 
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: Avatar.2010.MULTI.Remux.Plop.mkv" name="Nom_de_la_Source" id="Nom_de_la_Source">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Qualité Vidéo : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Qualité_Vidéo" placeholder="Selectionner la Qualité" name="Qualité_Vidéo" id="browser">
                </td>
                    <datalist id="Qualité_Vidéo">
                      <option value="Remux 2160p"></option>
                      <option value="Remux 1080p"></option>
                      <option value="2160p"></option>
                      <option value="1080p"></option>
                      <option value="720p"></option>
                      <option value="HdLight 2160p"></option>
                      <option value="HdLight 1080p"></option>
                      <option value="HdLight 720p"></option>
                      <option value="Dvd Rip"></option>
                    </datalist>
                </td>           
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Qualité Audio : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Qualité_Audio" placeholder="Selectionner la Qualité" name="Qualité_Audio" id="browser">
                </td>
                    <datalist id="Qualité_Audio">
                      <option value="Dolby Digital 7.1">
                      <option value="Dolby Digital 5.1">
                      <option value="Dolby Digital 2.0">
                      </option></datalist></td>           
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Codec Vidéo : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Codec_Vidéo" placeholder="Selectionner le Codec" name="Codec_Vidéo" id="browser">
                </td>
                    <datalist id="Codec_Vidéo">
                      <option value="x265">
                      <option value="x264">
                      <option value="Avc">
                      <option value="Divx">
                      </option>
                    </datalist>
                </td>           
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Codec Audio : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Codec_Audio" placeholder="Selectionner le Codec" name="Codec_Audio" id="browser">
                </td>
                    <datalist id="Codec_Audio">
                      <option value="Hd-Dts">
                      <option value="Dts">
                      <option value="Ac3">
                      <option value="Mp3">
                      </option>
                    </datalist></td>           
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Langue : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Langue" placeholder="Selectionner la Langue" name="Langue" id="browser" >
                    <datalist id="Langue">
                      <option value="Français"></option>
                      <option value="Français VFQ"></option>
                      <option value="Anglais"></option>
                      <option value="Espagnol"></option>
                      <option value="Allemand"></option>
                      <option value="Russe"></option>
                      <option value="Japonais"></option>
                      <option value="Chinois"></option>
                      <option value="Autre"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Langue 2 : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Langue2" placeholder="Selectionner la Langue" name="Langue2" id="browser" >
                    <datalist id="Langue2">
                      <option value="Français"></option>
                      <option value="Français VFQ"></option>
                      <option value="Anglais"></option>
                      <option value="Espagnol"></option>
                      <option value="Allemand"></option>
                      <option value="Russe"></option>
                      <option value="Japonais"></option>
                      <option value="Chinois"></option>
                      <option value="Autre"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Sous-titres  : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Sous_Titres" placeholder="Selectionner les Sous-titres" name="Sous_Titres" id="browser" >
                    <datalist id="Sous_Titres">
                      <option value="Français"></option>
                      <option value="Français Forcé"></option>
                      <option value="Anglais"></option>
                      <option value="Espagnol"></option>
                      <option value="Allemand"></option>
                      <option value="Russe"></option>
                      <option value="Japonais"></option>
                      <option value="Chinois"></option>
                      <option value="Autre"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Sous-titres 2 : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Sous_Titres2" placeholder="Selectionner les Sous-titres" name="Sous_Titres2" id="browser" >
                    <datalist id="Sous_Titres2">
                      <option value="Français"></option>
                      <option value="Français Forcé"></option>
                      <option value="Anglais"></option>
                      <option value="Espagnol"></option>
                      <option value="Allemand"></option>
                      <option value="Russe"></option>
                      <option value="Japonais"></option>
                      <option value="Chinois"></option>
                      <option value="Autre"></option></datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Sous-titres 3 : </label>
                </td>
                <td>
                  <input class="input_generateur" list="Sous_Titres3" placeholder="Selectionner les Sous-titres" name="Sous_Titres3" id="browser" >
                    <datalist id="Sous_Titres3">
                      <option value="Français"></option>
                      <option value="Français Forcé"></option>
                      <option value="Anglais"></option>
                      <option value="Espagnol"></option>
                      <option value="Allemand"></option>
                      <option value="Russe"></option>
                      <option value="Japonais"></option>
                      <option value="Chinois"></option>
                      <option value="Autre"></option>
                    </datalist>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Bitrate Vidéo : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 5000 Kb/s" name="Bitrate_Vidéo" id="Bitrate_Vidéo">
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Bitrate Audio : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 640 Kb/s" name="Bitrate_Audio" id="Bitrate_Audio">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="bouton_titre_generateur">Taille : </label>
                </td>
                <td>
                  <input class="input_generateur" type="text" placeholder="Ex: 5,7 Go" name="Taille" id="Taille">
                </td>
              </tr> 
              <tr>
                <td>
                </td>
                <td>
                  <button class="bouton_valider" type="submit" value="Boutton_envoyer">Valider</button> 
                </td>
              </tr> 
        </table>
      </section>
    </div>

  </body>

  <!--FOOTER---------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <?php include "footer.php"; ?>
</html>
