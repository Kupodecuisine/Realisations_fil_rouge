<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
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
	<section>
	<div class="formulaireDiv">
		
		<form action="" method="post">
			<h1>Supprimer un morceau</h1>
			<fieldset>
				<input type="text" name="nom_morceau" placeholder="Nom du morceau" required>
				<input type="submit" value="Supprimer">
			</fieldset>
		</form>
	</div>
	</section>
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

	<?php
			$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$database->exec("set names utf8"); 
			
			if(isset(
				$_POST['nom_morceau'])){
					$titreMorceau = $_POST['nom_morceau'];
			
			
				try {
					$query = $database->prepare("DELETE FROM morceau WHERE nom_morceau = :nom_morceau"); 
					$execution = $query->execute(array(
						'nom_morceau' => $titreMorceau
					));
					if ($execution){
						echo "<script type='text/javascript'>alert('Le morceau a bien été supprimé.');</script>";
						echo "<script type='text/javascript'>window.location.replace('../php/afficher.php');</script>";
					}
				} catch (EXCEPTION $e) {
					die("Le morceau n'a pas pu être supprimé.");
				}
			}

	?>
	
</html>