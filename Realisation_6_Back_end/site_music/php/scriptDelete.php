<?php
	$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$database->exec("set names utf8"); 
	
	if(isset($_GET['name'])){
	
		$titreMorceau = $_GET['name'];
			
		try {
			$query = $database->prepare('DELETE FROM morceau WHERE nom_morceau = "'. $titreMorceau .'"'); 
			$execution = $query->execute();
			if ($execution){
				echo "<script type='text/javascript'>alert('Le morceau a bien été supprimé.');</script>";
				header('Location: afficher.php');
			}
		} catch (EXCEPTION $e) {
			die("Le morceau n'a pas pu être supprimé.");
		}
	}
?>