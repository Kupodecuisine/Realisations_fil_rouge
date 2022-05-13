<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
    <link rel="icon" href="">
	<link rel="stylesheet" href="../css/css.css?v=<?php echo time(); ?>" type="text/css">
    

    
</head>
<body>
	<header>
			<h1><a href="index.html">Titre du site</a></h1>
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
	
		<div id="into">
			
				<div id="displaySong">
				<?php

					$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

					$database->exec("set names utf8"); 


					 try{
							$query = $database->query('SELECT * FROM morceau');
							while($data =$query->fetch()){
								echo 
										'<div>
											<img src="'.$data['image_morceau'].'" height="300px"></img>
										</div>	
										<div>	
												<h2>Morceau: '.$data['nom_morceau'].'</h2>
												
												<div>
													<audio controls src="'.$data['morceau'].'">=(</audio>
												</div>
												
												<p><strong>Compositeur:</strong> '.$data['compositeur_morceau'].'</p>
												<p><strong>Déscription:</strong> '.$data['description_morceau'].'</p>
												<p><strong>Genre:</strong> '.$data['genre_morceau'].'</p>
												
											
										</div>';
								}
					} catch(Exception $e){
							die('Erreur : ' .$e->getMessage());
					}
				?>
				</div>
			
			<div id="tracklook-alike">
				<h3>Recommandation :</h3>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=2" alt"super lien"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=3" alt"super lien 2"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=4" alt"super lien 3"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=5" alt"super lien 4"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=18" alt"super lien 5"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
				<a href=#><img class="alike" src="https://picsum.photos/100/100?random=19" alt"super lien 6"/>
					<h4>Titre morceau</h4><h5>Nom artiste</h5></a>
			</div>
			<!-- commentaire et liste de genre html
			<div>
				<ul>
					<li><a href=#>#chiptune</a></li>
					<li><a href=#>#remix</a></li>
					<li><a href=#>#chiptune</a></li>
					<li><a href=#>#remix</a></li>
				</ul>
				
			
				<p><strong>description : </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				Ut blandit, lectus nec pellentesque iaculis, neque eros sagittis ex, ut finibus ante libero non est. 
				Morbi non libero quis nunc rhoncus consequat. Phasellus bibendum urna vel faucibus auctor.</p>
				
				<form method="post" action="commentaire.php"> 
					<textarea cols="110" rows="5" placeholder="Laissez un commentaire..."></textarea>
					<div> <input type="submit" value="Valider"/> </div>
				</form>
			</div>
			-->
		
		</div>
		
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

// <?php

    // $database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // $database->exec("set names utf8"); 


	 // try{
			// $query = $database->query('SELECT * FROM morceau');
			// while($data =$query->fetch()){
				// echo 
					// '<div>
						// <img src="'.$data['image_morceau'].'"></img>
						// <section>
							// <p><strong>Morceau:</strong> '.$data['nom_morceau'].'</p>
							
							// <div>
								// <audio controls src="'.$data['morceau'].'">=(</audio>
							// </div>
							
							// <p><strong>Compositeur:</strong> '.$data['compositeur_morceau'].'</p>
							// <p><strong>Déscription:</strong> '.$data['description_morceau'].'</p>
							// <p><strong>Genre:</strong> '.$data['genre_morceau'].'</p>
							
						// </section> 
					// </div>';
			// }
	// } catch(Exception $e){
			// die('Erreur : ' .$e->getMessage());
	// }
// ?>


</html>