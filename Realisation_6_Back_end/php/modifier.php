<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../css/css.css?v=<?php echo time(); ?>" type="text/css">

    
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
											<form action="scriptModif.php" method="POST">
													<h1 class="titreForm">Modifier une musique : </h1>
													<fieldset class="mb-3">
													<label for="text">Nom du morceau :</label>
														<input type="text" name="nom_morceau" value="'.$data['nom_morceau'].'" required>
													</fieldset>
													<fieldset class="mb-3">
													<label for="text">Nom du compositeur :</label>
														<input type="text" name="compositeur_morceau" value="'.$data['compositeur_morceau'].'" required>
													</fieldset>
													<fieldset class="mb-3">
													<label for="text">Description :</label>
														<textarea type="text" name="description_morceau" value="'.$data['description_morceau'].'" required></textarea>
													</fieldset>
													 <fieldset class="mb-3">
													 <label for="text">Genre du morceau :</label>
														<input type="text" name="genre_morceau" value="'.$data['genre_morceau'].'" required>
													</fieldset>
													</fieldset class="mb-3">
													<input type="submit" value="modifier">
												</form>
												
												<form action="scriptDelete.php?name='.$data['nom_morceau'].'" method="post">
													<input type="submit" value="Supprimer">
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