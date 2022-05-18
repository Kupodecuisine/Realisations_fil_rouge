<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../css/css.css?v=<?php echo time(); ?>" type="text/css">
	<link rel="stylesheet" href="../css/responsive.css?v=<?php echo time(); ?>" type="text/css">      
</head>

<body>
	
		<?php include 'header.php'; ?>
        
		<?php

					$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

					$database->exec("set names utf8"); 

					if(isset($_GET['name'])){
						$titreMorceau = $_GET['name'];
			
						 try{
								$query = $database->query('SELECT * FROM morceau where nom_morceau = "'. $titreMorceau .'"');
								while($data =$query->fetch()){
									echo 
											
											'
											<div class="divForm">
											<form action="scriptModif.php?name='.$data['nom_morceau'].'" method="POST">
													<h1 class="titreForm btnBrutal">Modifier une musique : </h1>
													<fieldset>
													<label for="text">Nom :</label>
														<input type="text" name="nom_morceau" value="'.$data['nom_morceau'].'" required>
													</fieldset>
													<fieldset>
													<label for="text">Compositeur :</label>
														<input type="text" name="compositeur_morceau" value="'.$data['compositeur_morceau'].'" required>
													</fieldset>
													<fieldset>
													<label for="text">Description :</label>
														<textarea type="text" name="description_morceau" rows="4" cols="50" required>
															'.$data['description_morceau'].'
														</textarea>
													</fieldset>
													 <fieldset>
													 <label for="text">Genre :</label>
														<input type="text" name="genre_morceau" value="'.$data['genre_morceau'].'" required>
													</fieldset>
													</fieldset>
													<input type="submit" class="btnBrutal inputForm" value="Modifier">
												</form>
												
												<form action="scriptDelete.php?name='.$data['nom_morceau'].'" method="post">
													<input type="submit" class="btnBrutal inputForm endInput" value="Supprimer">
												</form>
											</div>';
									}
								
						} catch(Exception $e){
								die('Erreur : ' .$e->getMessage());
						}
					
					}		
		?>
			
	<?php include 'footer.php'; ?>
	
</body>
</html>