<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
    <link rel="icon" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/css.css?v=<?php echo time(); ?>" type="text/css">  
</head>

<body>

		<?php include 'header.php'; ?>
		
			<main class="border">
			
				<section class="containAllTracks">
				
					<?php

						$database= new PDO('mysql:host=localhost;dbname=site_music', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

						$database->exec("set names utf8"); 


						 try{
								$query = $database->query('SELECT * FROM morceau');
								while($data =$query->fetch()){
									echo 
											'
											<section class="containTrack">
											<div>
												<img src="'.$data['image_morceau'].'" height="300px" width="300px"></img>
											</div>	
											<div>	
													<h2>Morceau: '.$data['nom_morceau'].'</h2>
													
													<div>
														<audio controls src="'.$data['morceau'].'">=(</audio>
													</div>
											
													<p><strong>Compositeur:</strong> '.$data['compositeur_morceau'].'</p>
													<p><strong>Déscription:</strong> '.$data['description_morceau'].'</p>
													<p><strong>Genre:</strong> '.$data['genre_morceau'].'</p>
											</div>
											
											<a class="btnBrutal2" href="modifier.php?name='.$data['nom_morceau'].'">Modifier</a>
											
											</section>
											';
									}
						} catch(Exception $e){
								die('Erreur : ' .$e->getMessage());
						}
					?>
				
				</section>	
				
			</main>
		
		<?php include 'footer.php'; ?>
		
</body>
</html>