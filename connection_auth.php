<?php
	session_start();
	require 'db_ConnectString.php';
	$reponse0;
	$reponse1 = array();

	if (!empty($_POST))
	{
		if ($_POST['action'] === 'connection')
		{
			if (isset($_POST['myPseudo']))
			{
				$pseudo = $_POST['myPseudo'];		
				try
				{
					$sql = "SELECT * FROM users WHERE Pseudo='".$pseudo."'";  // $sql = "SELECT * FROM users WHERE pseudo='".$pseudo."'";
					$result = $db->prepare($sql);        
					$result->execute();

					$donnees = $result->fetch();
					
					if ($donnees['Passwd'] === $_POST['myPassword'])
					{ $_SESSION['userID'] = $donnees['ID']; $reponse0 = 'connected'; }
					else {	$reponse0 = 'notconnected'; }
				} catch (Exception $e)  { $reponse0 = 'Requete échouée !'; }
				echo $reponse0;
			}
			else if (isset($_POST['myID']))
			{
				$id = $_POST['myID'];		
				try
				{
					$sql = "SELECT * FROM users WHERE ID='".$id."'";  // $sql = "SELECT * FROM users WHERE pseudo='".$pseudo."'";
					$result = $db->prepare($sql);  $result->execute();
					$donnees = $result->fetch();

					$repPseudo =  $donnees['Pseudo'];
					$repAvatar =  $donnees['Avatar'];
					$reponse2 = array ( 'Pseudo'=>$repPseudo, 'Avatar'=>$repAvatar )  ;				
						
				} catch (Exception $e)  { $reponse2 = array('Requete échouée !'); }
				echo json_encode($reponse2);
			}
		}
		else if ($_POST['action'] === 'inscription')
		{
			if ( isset($_POST['myPseudo']) && isset($_POST['myPassword']) )
			{
				try
				{
					$pseudo = $_POST['myPseudo'];
					$pass = $_POST['myPassword'];
					$sql = "INSERT INTO users(Pseudo, Passwd) VALUES(?,?)";
					$result = $db->prepare($sql);
					$result->execute(array($pseudo, $pass));
					$reponse0 = 'inscrit';
				} catch (Exception $e)  { $reponse0 = 'echec !'; }
				echo $reponse0;
			}
		}
	}

	else { $reponse0 = 'Pas de paramètres envoyés'; unset($_SESSION['userID']); echo $reponse0;}	
?>