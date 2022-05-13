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
	<header>
			<h1><a href="../php/afficher.php">Titre du site</a></h1>
			<div>
				<div id="searchbar">
					<label for="searchbar">🔎🔎🔎</label>
					<input type="search" name"searchbar" placeholder="Entrez votre recherche"/>
				</div>
			</div>
			<nav>
				<ul>
					<li><a href="connexion.html">Connexion</a></li>
					<li><a href="inscription.html">S'inscrire</a></li>
				</ul>
			</nav>
	</header>
	
        
		<?php

					$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

					$database->exec("set names utf8"); 


					


					 try{
							$query = $database->query('SELECT * FROM morceau');
							while($data =$query->fetch()){
								echo 
										
										'<section>
										<div class="formulaireDiv">
										<form action="scriptModif.php" method="POST" enctype="multipart/form-data">
												<h1>Modifier une musique : </h1>
												<fieldset>
												<label for="text">Nom du morceau :</label>
													<input type="text" name="nom_morceau" value="'.$data['nom_morceau'].'" required>
												</fieldset>
												<fieldset>
												<label for="text">Nom du compositeur :</label>
													<input type="text" name="compositeur_morceau" value="'.$data['compositeur_morceau'].'" required>
												</fieldset>
												<fieldset>
												<label for="text">Description :</label>
													<input type="text" name="description_morceau" value="'.$data['description_morceau'].'" required size="100">
												</fieldset>
												 <fieldset>
												 <label for="text">Genre du morceau :</label>
													<input type="text" name="genre_morceau" value="'.$data['genre_morceau'].'" required>
												</fieldset>
												</fieldset>
												
												<fieldset>
													<label for="file">Image</label>
													<input type="file" name="image_morceau" accept=".jpg, .png"> 
												</fieldset>
												<input type="submit" value="modifier">
											</form>
										</div>
										</section>';
								}
							
					} catch(Exception $e){
							die('Erreur : ' .$e->getMessage());
					}
					
					
					
					
		?>
		
        

	
	<footer>
			<h1>Titre du site</h1>
			<p>...</p>
			<nav>
				<ul id="idflex">
					<li><a href=#>Contact</a></li>
					<li><a href=#>Mentions légales</a></li>
					<li><a href=#>...</a></li>
				</ul>
			</nav>
	</footer>
</body>
</html>