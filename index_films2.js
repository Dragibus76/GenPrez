    ////// Script by Greg Young (c) 2021 //////    
    var currentIDmedia = '';    // ID (movieDatabase) du film
    var tab_reponses = [];      // Tableau de réponses
    var imageMovie = '';        // Stockage de l'affiche du film (sinon une image par défaut)

/* Recherche Titre + Sélection titre */
    $('#monFormulaire').on('submit', function(e) {     
        e.preventDefault();
        var titre = $('#mon_titre').val();
        $('#searchResult').css('display', 'block');
        $('#contentResult').css('display', 'none'); 
        $('#resultats').css('display', 'none');

        $.ajax({    url:        'media_request.php',
                    type:       'POST',
                    dataType:   'html',
                    cache:      false,
                    data:       { my_title: titre },
                    success:    function(data)   {      
                                                        if (data) {
                                                            $('#zone_media').css('display', 'flex');                                                             
                                                            $('#myFlex').html(''); 
                                                            // changeFooter(false);
                                                            
                                                            // Récupérer les réponses en tableau 
                                                            tab_reponses = JSON.parse(data);          // Décodage du tableau
                                                            var res = '';

                                                            for (let i=0; i<tab_reponses.length; i++) // Afficher chaque réponse du tableau dans la console
                                                            {
                                                                elements = tab_reponses[i].split('|');
                                                                for (let j=0; j < elements.length; j++) 
                                                                {   
                                                                    if (elements[j] != '')
                                                                    {
                                                                        trucs = elements[j].split('¤');
                                                                        res += '<img class=bloc src='+trucs[1]+' onclick=displayMedia('+trucs[0]+')>';
                                                                    }                                                                    
                                                                 }                                                                                                             
                                                            }
                                                            
                                                            $('#myFlex').css('display', 'block'); 
                                                            $('#myFlex').html(res);
                                                            tab_reponses = [];                        // On vide le tableau (qui ne nous sert plus à rien, à cette étape)
                                                            
                                                        }
                                                        // else
                                                        // { changeFooter(false); }
                                                    },
                    error:      function(data)   {  alert(data); }
            });
    })
    function displayMedia(ref) {        
        $('#searchResult').css('display', 'none'); $('#contentResult').css('display', 'flex'); 

        $('#starPics').html(''); $('#acteurs_value').html(''); $('#linkYT').html('');
        $('#flexYT').css('display', 'none'); $('#titleBA').css('display', 'none');
        currentIDmedia = ref;

        $.ajax({  url:        'media_detail.php',
                  type:       'POST',
                  dataType:   'html',
                  cache:      false,
                  data:       { referenceID: currentIDmedia },
                  success:    function(data)   {  $('#resultats').css('display', 'block');
                                                  var elements = data.split('|');                                                    
                                                  for (let j=0; j < elements.length; j++)
                                                  {   
                                                      var item = elements[j].split('$');

                                                      if (item[0] == 'title')             { $('#title_value').html(item[1]); }

                                                      else if (item[0] == 'description')  { if (item[1] != '-') { 
                                                                                                                    $('#field_descr').css('display', 'flex'); 
                                                                                                                    $('#description_value').html(item[1]);
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_descr').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'synopsis')     { if (item[1] != '-') {  
                                                                                                                    $('#field_synopsis').css('display', 'flex'); 
                                                                                                                    $('#synopsis_value').html(item[1]); 
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_synopsis').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'genre')        { if (item[1] != '-') {  
                                                                                                                    $('#field_genre').css('display', 'flex');
                                                                                                                    $('#genre_value').html(item[1]); 
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_genre').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'posterStr')    { if (item[1] != '-') {  $('#poster_origin').html(item[1]); } }
                                                      else if (item[0] == 'posterImg')    { console.log('item : '+item[1]);
                                                                                            if (item[1] != '-') {  imageMovie = item[1]; }
                                                                                            else                {  imageMovie = '<img id="movieImage" src="image/Ooops150.png" />'; };                                                                      
                                                                                            $('#poster_value').html(imageMovie);
                                                                                          }

                                                      else if (item[0] == 'acteurs')   {  
                                                                                          var el = item[1].split('€'); 
                                                                                          for (let p=0; p < el.length; p++)
                                                                                          {
                                                                                              if (p < 10) {
                                                                                                var field = el[p].split('@');
                                                                                                $('#acteurs_value').append(field[0]);                       // Afficher le nom/prénom des comédiens
                                                                                                try { $('#starPics').append(field[1]); } catch (error) { }  // Afficher l'image si on peut lol
                                                                                              }
                                                                                          }  
                                                                                      } 

                                                      else if (item[0] == 'dateProd')     { if (item[1] != '-') {  
                                                                                                                    $('#field_dateProd').css('display', 'flex');
                                                                                                                    $('#date_prod_value').html(item[1]); 
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_dateProd').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'dateSortie')   { if (item[1] != '-') {  
                                                                                                                    $('#field_dateSortie').css('display', 'flex');
                                                                                                                    $('#dates_value').html(item[1]+ ' (France)');
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_dateSortie').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'budget')       { if (item[1] != '-') {  
                                                                                                                    $('#field_budget').css('display', 'flex');
                                                                                                                    $('#budget_value').html(item[1]+ ' $');
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_budget').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'recette')      { if (item[1] != '-') {  
                                                                                                                    $('#field_recette').css('display', 'flex');
                                                                                                                    $('#recettes_value').html(item[1]+ ' $');
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_recette').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'realisateur')  { if (item[1] != '-') {  
                                                                                                                    $('#field_director').css('display', 'flex');
                                                                                                                    $('#director_value').html(item[1]);
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_director').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'pays')         { if (item[1] != '-') {  
                                                                                                                    $('#field_pays').css('display', 'flex');
                                                                                                                    $('#pays_value').html(item[1]);
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_pays').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'duree')        { if (item[1] != '-') {  
                                                                                                                    $('#field_duree').css('display', 'flex');
                                                                                                                    $('#duree_value').html(item[1]);
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_duree').css('display', 'none'); }
                                                                                          }

                                                      else if (item[0] == 'trailer')      { if (item[1] != '-') {   $('#field_trailer').css('display', 'flex');
                                                                                                                    if (item[1] != '') { $('#linkYT').html(item[1]); }
                                                                                                                    else { $('#linkYT').html(''); };
                                                                                                                    chargerMedia();
                                                                                                                }
                                                                                                                else
                                                                                                                {   $('#field_trailer').css('display', 'none'); }
                                                                                          }
                                                  } 
                                              },
                  error:      function(data)   {  alert(data); }
            }); 

            // ajuster_PosterHeight();
            //setTimeout(() => { ajuster_listeActeurs();  }, 3000)  
    }

    /* Ajuster la hauteur de la liste 'acteurs' */
    var minHeight_poster = $('#affiche').css('height').replace('px','');
    function ajuster_PosterHeight() {
        minHeight_poster = Number(  $('#poster_value').css('height').replace('px','') )+60; 
        $('#affiche').css('height', minHeight_poster+'px');
     }
    function ajuster_listeActeurs() {
        ajuster_PosterHeight();
        $('#contenu').css('minHeight', minHeight_poster+'px');

        var master = $('#contenu');
        var enfants = master.children();
        var marge = 3;
        let h= 0;

        for (let a=0; a < enfants.length; a++)
        {
            if (enfants[a].id != undefined)
            {
                if ( $('#'+enfants[a].id).css('display') == 'flex')
                {   h += Number(  $('#'+enfants[a].id).css('height').replace('px','') - marge );  }                
            }            
        }
        $('#section_acteurs').css('height', h+'px');
    }

    /* Afficher la photo de l'acteur */
    function displayActor(id) {                  
        // Afficher l'image
        let thisSRC = $('#castperson'+id).attr('src');
        $('#nomAffiche').slideUp(100);
        $('#movieImage').fadeOut(500, function () {                  
            $('#movieImage').fadeIn(300);
            $('#movieImage').attr('src', thisSRC);
            // Afficher son nom/prénom            
            $('#nomAffiche').html($('#cast'+id).html());
            $('#nomAffiche').slideDown(100);
        });
     }
    function displayImgMovie() {      
        let parent = document.getElementById('poster_value');
        let enfant = document.getElementById('poster_value').firstChild;            
        
        $('#movieImage').fadeOut(500, function () {
            $('#nomAffiche').slideDown(100);
            $('#movieImage').fadeIn(300);
            // Supprimer l'enfant de #movieImage
            parent.removeChild(enfant) 
            // Ajouter l'enfant
            $('#poster_value').append(imageMovie);
            $('#nomAffiche').html(''); 
            $('#nomAffiche').toggle();               
        });
    }


    /* Zone Trailer (YouTube) */
    function chargerMedia() { 
        if ($('#linkYT').html() != '') {
            $('#flexYT').css('display', 'block'); $('#titleBA').css('display', 'block');
            var largeur = document.getElementById('flexYT').offsetWidth-1;
            var hauteur = Number(document.getElementById('flexYT').offsetWidth *0.6)+'px';
            document.getElementById('flexYT').style.height = hauteur;

            var objmedia = $('#linkYT').html();
            var parent = document.getElementById('flexYT');

            objmedia = objmedia.replace('watch?v=', 'embed/', objmedia) ;
            objmedia = objmedia.replace('https://youtu.be/', 'https://www.youtube.com/embed/', objmedia) ;
            var path = "<iframe id=ytPlayer class=\"embedresize bordure2\" width=" + 100+'%' + " height=" + 100+'%' + " src=" + objmedia +
                    " frameborder=\"0\" allow=\"accelerometer; encrypted-media; gyroscope; picture-in-picture; fullscreen\"></iframe>";
            parent.innerHTML = path; parent.style.display = 'block'; 
            parent.style.marginBottom = 20+'px'; 

            $('#ytPlayer').css('borderRadius', 10+'px');
            $('#ytPlayer').css('border', '1px solid rgb(100,100,100)');
            $('#ytPlayer').css('width', '100%');
            $('#ytPlayer').css('height', '100%');
        }
        else
        {
            $('#flexYT').css('display', 'none'); $('#titleBA').css('display', 'none');
        }
    }

    /* Modale Acteurs */
    function ShowModal_Actors() {        
        $('#info_title').html('COMEDIENS');
        $('#Modal_Info').css('height', window.innerWidth);
        $('#Modal_Info').css('opacity', 1);
        $('#Modal_Info').show();
        
        var iSerie = 1;

        $.ajax({  url:        'media_getActors.php',
                  type:       'POST',
                  dataType:   'html',
                  cache:      false,
                  data:       { referenceID: currentIDmedia, numSerie:iSerie },
                  success:    function(data)   {    if (data != null) {    
                                                        var reponse = data.split('#');
                                                        //$('#info_msg').append(reponse[0]+'<br />');  // Nb total d'éléments de la liste

                                                        var elements = reponse[1].split('|');                                                    
                                                        for (let a=0; a < elements.length; a++)
                                                        {   $('#info_msg').append(elements[a]+'<br />'); }  // Afficher le nom/prénom des comédiens 
                                                    } 
                                               },
                  error:      function(data)   {  alert(data); }
            });
    }
    $("#close_modale").click(function(e) { $("#info_fermer").click(); })
    $("#info_fermer").click(function(e) { $("#Modal_Info").animate( {'opacity':'0'}, 350, function() {  $("#Modal_Info").css("display", "none"); $('#info_msg').html(''); } ); } ) 
/* -------------------- */ 