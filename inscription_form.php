<?php session_start(); ?>

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
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

        <!-- FONTES -->
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">

        <style>
            body                    { background-image:url(image/slider.png); background-size: cover; background-position: center; }    
            #box                    { width: 60%; padding: 5%; margin: 0 auto; }        
            #monForm                { display: flex; width: 100%; margin:0 auto; height: auto; padding: 2%; background-color: rgb(30,40,52);
                                      border-radius: 10px; border: 1px solid black; color: #fff; box-shadow: 1px 1px 12px #fff;}
            #monForm li             { text-align: center; margin-top: 20px}
            #monForm li a           { list-style: none; font-style: italic; text-align: center; color: rgb(100,90,100); text-decoration: none}
            #monForm li a:hover     { text-decoration: underline;  color: orange; }
            #monForm a              { display: inline-block; width: 100%; text-align: center; text-decoration: underline; color: #fff}
            #imgLogoV               { display: flex; width:25%; background-position: center; background-size: contain; 
                                      background-image: url('image/LogoV.gif'); background-attachment: local; background-repeat: no-repeat;}
            .input1                 { display: block; margin: 0 auto; position: relative; width: 70%; min-width: 130px; background-color: rgb(232, 240, 254); padding: 1% 2%;
                                      margin-bottom: 10px; border-radius: 10px; border: 1px solid black; outline: 0; color: #000; text-align: center }
            .inputFormButton        { display: block; width: 50%; min-width: 130px; margin: 0 auto; border: 1px solid grey; }
            .inputFormButton:hover  { color: #000; }
            #blocInputs             { margin: none; float: right; background-color: rgb(232, 240, 254)}
            h3                      { text-align: center; font-family: 'Potta One'; font-size: 1.2em; margin: 5px 0px -5px 0px; }
            #return                 { cursor: pointer; }
        </style>
    </head>

    <body>

        <div class="container-fluid">             
            <div class="container" style="display: flex; align-items: center; ">  
                
                <div id="box">
                    <form id="monForm">
                        <div id="imgLogoV"></div>

                        <div style="width:75%">
                            <h3>INSCRIPTION</h3>
                            <hr size="3" width="100%" height="1px" style="background: grey; margin-bottom: 8px"/>

                            <a>pseudo</a><input type="text" id="mon_pseudo" class="input1" autocomplete="off" />
                            <a>mot de passe</a><input type="text" id="mon_mdp1" class="input1" autocomplete="off" />    
                            <a>retapez le mot de passe</a><input type="text" id="mon_mdp2" class="input1" autocomplete="off" />                        

                            <div style="display: inline-flex; width: 100%"><input type="submit" value="s'inscrire" class="inputFormButton"/></div>

                            <hr size="3" width="100%" height="1px" style="background: grey; margin-bottom: -12px"/>
                            <li style="float: left; width: 48%; margin-right: 4%"><a href="connection_form.php">connection</a></li>
                            <li style="float: left; width: 48%;"><a id="return">annuler</a></li>
                        </div>
                    </form> 
                </div>

            </div>
        </div>
        
    </body>

</html>



<script>
    $('#monForm').on('submit', function() {
        var operation = 'inscription';
        var nom = $('#mon_pseudo').val();
        var pass1 = $('#mon_mdp1').val();
        var pass2 = $('#mon_mdp2').val();
        var message = '';

        if (pass1 != '' && pass2 != '' && pass1 == pass2)
        {
            $.ajax({    url:      "connection_auth.php",
                        type:     "POST",
                        data:     {action:operation, myPseudo:nom, myPassword:pass1},
                        cache:    false,
                        success:  function(data)  {     if (data === 'inscrit')   { message = 'Inscription réussie !'; }
                                                        else                      { message = 'Une erreur s\'est produite !'; }   
                                                        alert(message);
                                                        window.location.href = "connection_form.php";                                                                                               
                                                },
                        error:    function(data)  { alert('une erreur s\'est produite !'); }  
                });
        }
        else
        {
            alert('les passwords ne sont pas identiques !');
        }
    })

    $('#return').on('click', function() {
        window.location.href = "<?php echo $_SESSION['lastUrl'] ; ?>";
    })
</script>