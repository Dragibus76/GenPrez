<nav class="nav">
<div class="container">
        <div class="logo"><a href="#"><img class="" src="image/Logo2.gif" width="100%"></a></div>

        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><a href="index.php">Accueil</a></li>
                <li>                    
                    <a href="Generateur.php" onmouseenter="display_ssmenuGen('block')" >Générateur</a>
                    <div id="ssmenu_gen" onmouseleave="display_ssmenuGen('none')"
                         style="display: none; width: auto; line-height: 1px; text-align: left; margin-top: -10px;">
                         <h5 id="goGenManuel">manuel</h5>
                    </div>
                </li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="Contact.php">Contact</a></li>
                
                <!-- AFFICHAGE CONDITIONNEL (Membre enregistré ou pas) -->
                <div id="isConn" style="display: none">
                    <li>
                        <img id="avatar" src="image/default.png" />
                        <div style="float: right; width: 80px; line-height: 1px; text-align: left; margin-left: 10px;" onmouseenter="display_ssmenuCompte('block')"  onmouseleave="display_ssmenuCompte('none')">
                            <a id="username" ></a>

                            <div id="ssmenu_compte" style="display: none; margin-top: -10px;">
                                <h5 id="goProfil">profil</h5>
                                <h5 id="goMessagerie">messagerie</h5>
                                <h5 id="goDeconnect">déconnection</h5>
                            </div>
                        </div>                        
                    </li>
                </div>
                <div id="isnotConn" style="display: block"><li><a id="link_connect" href="connection_form.php" >Connexion</a></li></div> 
                <!------------------------------------------------------->
            </ul>
        </div>

        <span class="navTrigger">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </div>
</nav>

  

<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) { $('.nav').addClass('affix'); } // console.log("OK"); 
        else { $('.nav').removeClass('affix'); }
    });

    window.addEventListener("DOMContentLoaded", (event) => {        
            var _key = "userID";
            $.ajax({    url:      "getSessionKey.php",
                        type:     "POST",
                        data:     {myKey:_key},
                        success:  function(data)  { if (data === 'true')
                                                    {
                                                        var user = "<?php echo $_SESSION['userID'] ?>";
                                                        var blocConnected = document.getElementById('isConn');
                                                        var blocDefault = document.getElementById('isnotConn');

                                                        if (user != '') { blocConnected.style.display = 'block'; blocDefault.style.display = 'none'; }
                                                        else            { blocConnected.style.display = 'none'; blocDefault.style.display = 'block'; }                                                        
                                                        getUserParams(user); /* Réponse à afficher */                                     
                                                    }                                                            
                                                },
                        error:    function(data)  { alert('une erreur s\'est produite !'); }  
                });
    })

    function getUserParams(id) {
        var operation = 'connection';
        $.ajax({    url:      "connection_auth.php",
                    type:     "POST",
                    data:     {action:operation, myID:id},
                    cache:    false,
                    success:  function(data)  { var myResult = JSON.parse(JSON.stringify(data));                // Ligne complète décodée
                                                var nbParams =  Object.keys(JSON.parse(myResult)).length;   // Nb de clefs contenues dans le tableau json décodé. 
                                                var j = 0;
                                                JSON.parse(myResult, (key, value) => { 
                                                    if (key != '')
                                                    {   
                                                        j++;
                                                        if (key == 'Pseudo') { $('#username').html(value)}
                                                        else if (key == 'Avatar') {   console.log('avatar : '+value); if (value == '') { value = 'image/default.png'; } else { value = 'users/avatars/'+value; }
                                                                                      $('#avatar').attr('src', value)
                                                                                  }
                                                    }
                                                });                                                   
                                              },
                    error:    function(data)  { alert('une erreur s\'est produite !'); }  
            });
    }
    
    

    

    /* SOUS-MENUS GENERAUX */
    function display_ssmenuGen(etat) {
        $('#ssmenu_gen').css('display', etat);
        if (etat === 'block') { $('.nav').css('height', 100+'px'); } else { $('.nav').css('height', 65+'px'); }        
     }
    function display_ssmenuCompte(etat) {
        $('#ssmenu_compte').css('display', etat);
        if (etat === 'block') { $('.nav').css('height', 130+'px'); } else { $('.nav').css('height', 65+'px'); }        
    }

    $('#goProfil').on('click', function() {
        alert('Clic sur Profil');
     })
    $('#goMessagerie').on('click', function() {
        alert('Clic sur Messagerie');
     })
    $('#goDeconnect').on('click', function() {
        $.ajax({    url:      "deconnection.php",
                    type:     "POST",
                    cache:    false,
                    success:  function(data)  { 
                                                    $('#isnotConn').css('display', 'block');
                                                    $('#isConn').css('display', 'none');   
                                                    $('#username').html('');
                                                    $('#avatar').attr('src', 'image/default.png');                                                    
                                              },
                    error:    function(data)  { alert('une erreur s\'est produite !'); }  
              });        
    })
</script>
  
