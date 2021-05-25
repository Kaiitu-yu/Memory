<?php
	$images = array("img/ane.jpg","img/chat.jpg","img/chien.jpg","img/lama.jpg","img/lapins.jpg","img/lionne.jpg","img/ours.jpg");
	$images_double = array_merge($images, $images); // Double les images
	$image_dos = 'img/dos.jpg';
	shuffle($images_double);
	if(isset($_GET['pseudo'],$_GET["min"], $_GET["sec"])){
		$etat = 'victoire';
	}else{
		$etat = 'jeu';
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AMBO PROJECT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script type="text/javascript">
	<?php
		$derniere_cle = array_pop(array_keys($images_double));
		echo 'var carte = [';
		foreach($images_double as $cle => $valeur){
			if($cle === $derniere_cle){
				echo "'$valeur'";
			}
			else{
				echo "'$valeur',";
			}
		}
		echo '];';
	?>
	</script>
</head>
<body>
	<header>
	      <div class="logo">
	          AMBO <strong>PROJECT</strong>
	      </div>
	      <label for="btn" class="icon">
	          <span class="fa fa-bars"></span>
	      </label>
	      <input type="checkbox"  id="btn">

	</header>
<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Accueil</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Profil</a></li>
            <li><a href="#"><i class="fas fa-laptop-code"></i>Algo 1</a></li>
            <li><a href="#"><i class="fas fa-laptop-code"></i>Algo 2</a></li>
            <li><a href="#"><i class="fas fa-laptop-code"></i>Algo 3</a></li>
            <li><a href="#"><i class="fas fa-laptop-code"></i>???</a></li>
            <li><a href="#"><i class="fas fa-laptop-code"></i>???</a></li>
        </ul>

    </div>
		<div class="main_content">
		<section>

			<h1><u>Memory</u></h1>
			<p>Retourner deux cartes, si ces deux cartes sont identiques, alors vous venez de faire une paire.</p>
			<p>Le but du jeu est de retourner toutes les cartes en face visible.</p>

			<strong><p>Chronomètre: <span id="chrono">00:00</span> - Nombre de paire(s): <span id="paires">0</span></p></strong>
			<div id='alert'>Les 2 images sont différentes !</div>

			<div id="games">
				<?php

					if($etat == 'victoire'){
						echo '<div style="display:block">
								<h1>Félicitations, vous avez gagné <span>'.$_GET["pseudo"].'</span> !</h1>
								<h4>Vous avez fait <span>'.$_GET["paires"].'</span> paires en <span>'.$_GET["min"].'</span> minute(s) et <span>'.$_GET["sec"].'</span> seconde(s).</h4>
								<a href="./index.php"><input type="button" class="restart" value="Recommencer"></a>
								</div>';
					}else{
						for($afficher_images=0; $afficher_images <= sizeof($images_double)-1; $afficher_images++){
							echo '<img src="'.$image_dos.'" onclick="choisir('.$afficher_images.')" draggable="false">';
						}
					}

				?>
			</div>

		</section>

		<script type="text/javascript" src="js/script.js"></script>
		</div>
	</div>
	<footer>
		<div class="footer-content">
				<h3>AMBO PROJECT</h3>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo iste corrupti doloribus odio sed!</p>
		</div>
		<div class="footer-bottom">
				<p>Copyright &copy;2020 AMBO PROJECT. Designed by <span>AMBO</span></p>
		</div>
	</footer>
	</body>
</html>
