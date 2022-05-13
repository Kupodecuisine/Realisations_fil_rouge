<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
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
        
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Ajouter une musique : </h1>
			<fieldset>
                <label for="file">Morceau :</label>
                <input type="file" name="morceau_morceau" accept=".wav, .mp3, .ogg" > 
            </fieldset>
            <fieldset>
                <input type="text" name="nom_morceau" placeholder="nom" required>
            </fieldset>
            <fieldset>
                <input type="text" name="compositeur_morceau" placeholder="Compositeur" required>
            </fieldset>
            <fieldset>
                <input type="text" name="description_morceau" placeholder="Description" required size="100">
            </fieldset>
             <fieldset>
                <input type="text" name="genre_morceau" placeholder="Genre" required>
            </fieldset>
            </fieldset>
			
            <fieldset>
                <label for="file">Image</label>
                <input type="file" name="image_morceau" accept=".jpg, .png"> 
            </fieldset>
            <input type="submit" value="Ajouter">
        </form>
    </div>
	</section>
	
	<?php 
	
		$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$database->exec("set names utf8"); 
	
		if(isset(
		$_FILES['morceau_morceau'],
        $_POST['nom_morceau'],
        $_POST['compositeur_morceau'],
        $_POST['description_morceau'],
        $_POST['genre_morceau'],
        // $_POST['genre_morceau'], pour le genre prédéfini ? à voir
        $_FILES['image_morceau']
        )){
			// import morceau
            //stocke le chemin et le nom temporaire du fichier importé (ex /tmp/125423.pdf)
            $tmpName = $_FILES['morceau_morceau']['tmp_name'];
            //stocke le nom du fichier
            $nomMusic = $_FILES['morceau_morceau']['name'];
            //stocke la taille du fichier en octets
            $size = $_FILES['morceau_morceau']['size'];
            //stocke les erreurs
            $error = $_FILES['morceau_morceau']['error'];
            //déplacer le fichier importé dans le dossier image à la racine du projet
            $file = move_uploaded_file($tmpName, "../music/$nomMusic");
			
            $nomMorceau = $_POST['nom_morceau'];
            $compositeurMorceau = $_POST['compositeur_morceau'];
            $descriptionMorceau = $_POST['description_morceau'];
            $genreMorceau = $_POST['genre_morceau'];

            // import image
            //stocke le chemin et le nom temporaire du fichier importé (ex /tmp/125423.pdf)
            $tmpName = $_FILES['image_morceau']['tmp_name'];
            //stocke le nom du fichier
            $nomImage = $_FILES['image_morceau']['name'];
            //stocke la taille du fichier en octets
            $size = $_FILES['image_morceau']['size'];
            //stocke les erreurs
            $error = $_FILES['image_morceau']['error'];
            //déplacer le fichier importé dans le dossier image à la racine du projet
            $file = move_uploaded_file($tmpName, "../img/$nomImage");

			
			try {
				$query = $database->prepare("INSERT INTO morceau SET 
					morceau = :morceau_morceau,
					nom_morceau = :nom_morceau,
					compositeur_morceau = :compositeur_morceau,
					description_morceau = :description_morceau,
					genre_morceau = :genre_morceau,
					image_morceau = :image_morceau;"
				); 
			
				$execution = $query->execute(array(
					'morceau_morceau' => "../music/$nomMusic", 
					'nom_morceau' => $nomMorceau, 
					'compositeur_morceau' => $compositeurMorceau,
					'description_morceau' => $descriptionMorceau,
					'genre_morceau' => $genreMorceau,
					'image_morceau' => "../img/$nomImage"
				));
				if ($execution){
					echo "<script type='text/javascript'>alert('Le morceau a bien été ajouté.');</script>";
					echo "<script type='text/javascript'>window.location.replace('../php/afficher.php');</script>";
				}
			} catch (EXCEPTION $e) {
				echo "Le morceau n'a pas pu être ajouté.";
				var_dump( $nomMorceau, $compositeurMorceau, $descriptionMorceau, $genreMorceau);
			}

			
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