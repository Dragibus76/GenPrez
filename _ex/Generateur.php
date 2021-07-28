<!doctype html>
<html>
    <head>
      <meta name="viewport" charset="utf-8"content="width=device-width" />
         <title>TMDB PHP API - Examples</title>
         
         <!-- <link href="css/footer.css" type="text/css" rel="stylesheet" /> -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          <link href="css/style.css" type="text/css" rel="stylesheet" />
          <style>
                #monFormulaire          { margin-top: 35px; padding-top: 15wpx; padding-left: 17px; }
                .inputFormSaisie        { padding: 5px; border: 1px solid gray; border-radius: 5px; outline: 0; }
                .inputFormButton        { padding: 5px 8px; border: 1px solid gray; border-radius: 5px; outline: 0; cursor: pointer;
                                          font-family: "Quicksand", sans-serif; color: #01b4e4;}
                .inputFormButton:hover  { background-color : lightskyblue; }
                #liste                  { float: left; width: 25%; min-height: 408px; background-color: #90cea1; padding: 15px; border-radius: 10px; margin-left: 1%; }
                #liste li               { background-color: white; margin: 4px 0px; border-radius: 5px ;;}
                #liste li a             { text-decoration: none; cursor: pointer;font-family: "Quicksand"; color: black;}
                #liste li a:hover       { text-decoration: underline; }
                #resultats              { float: left; width: 72%; height: auto; border-radius: 10px; border: 1px solid lightgrey; padding: 15px; margin: 0px 1% 0px 1%; }
                .libelles               { float: left; width: 25%; text-decoration: underline; font-weight:600;
                                          font-family: Quicksand, sans-serif; color: rgb(13, 37, 63); }
                .nouveau                { float: none; width: auto; font-family: Quicksand, sans-serif; color: black;text-decoration: none; font-weight: normal; }
                .libelles:hover       { text-decoration: none; }
                #poster_value img       { border-radius: 10px; }  

                #test2                  { display: table;
                                          height: 80px;
                                          width: 350px;
                                          border-radius: 5px;
                                          background-color: red;
                                          margin: 10px 0% 10px 41%;
                                          background: rgb(144,206,161);
                                          background: linear-gradient(90deg, rgba(144,206,161,1) 0%, rgba(1,180,228,1) 100%); 
                                        }              
          </style>          
    </head>

    <body>
      <?php include_once "header.php"; ?>

      <div id="main">
          <section class="home"></section>

          <div id="test2">
            <div class="Forme_Recherche">
                    
                <form id="monFormulaire">
                    <p>
                        <input type="text" id="mon_titre" class="inputFormSaisie" />
                        <input type="submit" value="Rechercher un Film" class="inputFormButton"/>
                    </p>
                </form>
                <br /><br />
            </div>
          </div>

          <div style="display: inline-block; width: 100%;">
            <div id="liste" style="display: none"></div>

            <div id="resultats" class="degrade01" style="display: none; ">

                <div style="float: left; width: 49%; margin-right: 1%">
                  <div style="margin-bottom: 4px; ">
                      <a id="title" class="libelles">Titre</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="title_value" ></a></div>

                      <a id="synopsis" class="libelles">Synopsis</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="synopsis_value"></a></div>

                      <a id="genre" class="libelles">Genre</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="genre_value"></a></div>    

                      <a id="realisateur" class="libelles">Réalisateur</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="crew_director_value"></a></div>  

                      <a id="production" class="libelles">Production</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="crew_production_value"></a></div>    

                      <a id="date_prod" class="libelles">Date (prod)</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="dateProd_value"></a></div>   

                      <a id="sortie" class="libelles">Sortie</a>
                      <div style="float: left; width: 75%;"><a class="libelles nouveau" id="dateSortie_value"></a></div>                    
                  </div>
                </div>

                <div style="float: left; width: 24%; margin-right: 1%">
                    <div style="margin-bottom: 4px; "><a id="acteurs" class="libelles" style="float: none">Acteurs</a>
                    <div style="float: left; width: 100%;"><a class="libelles nouveau" id="acteurs_value"></a></div></div>
                </div>

                <div style="float: left; width: 25%">
                   <!--  <a id="poster" class="libelles" style="margin-top: 10px">Poster</a> -->
                    <div style="float: left; width: 100%; margin-top: 0px"><a id="poster_value"></a></div>
                </div>

                <button id="changeDegrade" onclick="changeDegrade()" style="width: auto; height: auto; padding: 5px 8px;" >Changer</button>
                <a id="monDegrade" style="width: auto; color: white; background-color: rgb(50,50,50)";></a>
            </div>

            
          </div>
            
      </div>

      <?php include "footer.php"; ?>

    </body>

    
</html>

<script type="text/javascript">
  window.onload = function(e){ changeFooter(true); }

  var tab_reponses = [];

  $('#monFormulaire').on('submit', function() {
    event.preventDefault();
    var titre = $('#mon_titre').val();
    $('#liste').html('');
    
    if (titre != '') {
      $.ajax({  url:        'media_request.php',
                type:       'POST',
                dataType:   'html',
                cache:      false,
                data:       { my_title: titre },
                success:    function(data)   {        
                                                  $('#liste').html(''); 

                                                  if (data) {
                                                    changeFooter(false);
                                                  
                                                    // Récupérer les réponses en tableau 
                                                    tab_reponses = JSON.parse(data);          // Décodage du tableau
                                                    var res = '';

                                                    for (let i=0; i<tab_reponses.length; i++) // Afficher chaque réponse du tableau dans la console
                                                    {
                                                        elements = tab_reponses[i].split('|');
                                                        res += '<li>';
                                                        for (let j=0; j < elements.length; j++) {   res += elements[j];   }  
                                                        res += '</li>';  

                                                    }

                                                    $('#liste').css('display', 'block'); 
                                                    $('#liste').html(res);
                                                    tab_reponses = [];                        // On vide le tableau (qui ne nous sert plus à rien, à cette étape)
                                                  }
                                                  else
                                                  {
                                                    changeFooter(false);
                                                  }
                                              },
                error:      function(data)   {  alert(data); }
             });
    }
    else
    {
      $('#liste').css('display', 'none');
      $('#resultats').css('display', 'none');
      changeFooter(true);
    }
  })

  function displayMedia(ref) {
    event.preventDefault();
    var myRef = ref;

    $.ajax({  url:        'media_detail.php',
              type:       'POST',
              dataType:   'html',
              cache:      false,
              data:       { referenceID: myRef },
              success:    function(data)   {        
                                                var elements = data.split('|');                                                    
                                                for (let j=0; j < elements.length; j++)
                                                {   
                                                    if (j==0)        { $('#title_value').html(elements[j]); }
                                                    else if (j==1)   { $('#synopsis_value').html(elements[j]); }
                                                    else if (j==2)   { $('#genre_value').html(elements[j]); }
                                                    else if (j==3)   { $('#poster_value').html(elements[j]); }
                                                    else if (j==4)   { $('#acteurs_value').html(elements[j]); }                                                    
                                                    else if (j==5)   { $('#crew_director_value').html(elements[j]); }
                                                    else if (j==6)   { $('#crew_production_value').html(elements[j]); }
                                                    else if (j==7)   { $('#dateProd_value').html(elements[j]); }
                                                    else if (j==8)   { $('#dateSortie_value').html(elements[j]); }
                                                } 

                                                $('#resultats').css('display', 'block');
                                            },
              error:      function(data)   {  alert(data); }
           });
  }

  function changeFooter(etat) {
    if (etat == true) {
      $('footer').css('position', 'absolute');
    }
    else
    {
      $('footer').css('position', 'relative');
    }
  }

  var tab_degrades = [];
  tab_degrades.push('degrade01');
  tab_degrades.push('degrade02');
  tab_degrades.push('degrade03');
  tab_degrades.push('degrade04');
  tab_degrades.push('degrade05');
  tab_degrades.push('degrade06');
  tab_degrades.push('degrade07');
  tab_degrades.push('degrade08');
  tab_degrades.push('degrade09');
  tab_degrades.push('degrade10');
  tab_degrades.push('degrade11');
  tab_degrades.push('degrade12');
  tab_degrades.push('degrade13');
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
