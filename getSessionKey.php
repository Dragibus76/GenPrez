<?php 
    session_start();
    if (isset($_POST['myKey']))
    {
        $key = $_POST['myKey'];
        if (isset($_SESSION[$key])) { echo 'true'; } else { echo 'false'; }
    }
    else    
    {
        ?><script>alert('aucun parametre transmis');</script><?php
    }
?>