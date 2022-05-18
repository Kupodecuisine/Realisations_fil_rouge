<?php
	
	$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$database->exec("set names utf8"); 
	
		if(isset(
		$_POST['nom_morceau'],
        $_POST['compositeur_morceau'],
        $_POST['description_morceau'],
        $_POST['genre_morceau'],
        )){
			
			
            $nomMorceau = $_POST['nom_morceau'];
            $compositeurMorceau = $_POST['compositeur_morceau'];
            $descriptionMorceau = $_POST['description_morceau'];
            $genreMorceau = $_POST['genre_morceau'];

			
			try {
				$query = $database->prepare('UPDATE morceau SET
					
					nom_morceau = :nom_morceau,
					compositeur_morceau = :compositeur_morceau,
					description_morceau = :description_morceau,
					genre_morceau = :genre_morceau
					WHERE nom_morceau = "'. $_GET['name'] .'"'
				); 
			
				$execution = $query->execute(array(
					'nom_morceau' => $nomMorceau, 
					'compositeur_morceau' => $compositeurMorceau,
					'description_morceau' => $descriptionMorceau,
					'genre_morceau' => $genreMorceau,
				));
				
				if ($execution){
					header('Location: afficher.php');
					echo "<script type='text/javascript'>alert('Le morceau a bien été modifié.');</script>";
				}
			} catch (EXCEPTION $e) {
				echo "Le morceau n'a pas pu être ajouté.";
				var_dump( $nomMorceau, $compositeurMorceau, $descriptionMorceau, $genreMorceau);
			}

			
		}

?>