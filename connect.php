<?php
session_start();
//inclure les pages de function et de la barre de navigation
include 'function.php';
//si le bouton se connecter est enclenché
if (isset($_POST["ok"])) {
	//on verifie si les cases sont vides
	if (mailVerif($_POST["email"])) {
		//on recupre les valeurs entrer et les stock dans des variables
		$email = $_POST["email"];
		$mdp = $_POST["mdp"];
		// $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

		//connexion à la base de donnée en appelant la function concerner
		$bdd = connexion();
		//on selectionne dans la base de donnée les informations correspondantes à celle entrer par l'utilisateur
		$req = $bdd->prepare("SELECT * FROM user WHERE email=? and mdp=?");
		$req->execute(array($email, $mdp));
		//on compte si une ligne avec le résultat existe et la stock dans une variable
		$res = $req->rowCount();
		//on cherche la ligne correspondante à celle écrite par l'utilisateur
		$ligne = $req->fetch(PDO::FETCH_ASSOC);

		//si le compte est égal à 1
		if ($res == 1) {
			//on ouvre une session de navigation avec l'email en question
			$_SESSION["email"] = $ligne["email"];
			header("location:index.php");
		} else {
			//au cas ou le compte est différent de 1
			$erreur = "<h3> Erreur d'email' ou mot de passe !!!</h3>";
			echo $erreur;
		}
	} else {
		echo "L'un des champs est vide, veuillez reprendre";
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Site de réservation</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Header -->
		<header id="header" class="alt">
			<a href="index.php" class="logo"><strong>Site de reservation</strong> <span>M2L</span></a>
			<nav>
				<a href="index.php">Retour</a>
				<a href="#menu">Menu</a>
			</nav>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<ul class="links">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="about.php">Présentation</a></li>
				<li><a href="elements.php">Réservation</a></li>
			</ul>
			<ul class="actions stacked">
				<li><a href="subscribe.php" class="button fit">Inscription</a></li>
				<li><a href="connect.php" class="button fit">Connexion</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main" class="alt">
			<!-- One -->
			<section id="one">
				<div class="inner">
					<header class="major">
						<h1>Connectez-vous !</h1>
					</header>
					<!-- Elements -->
					<div class="row gtr-200">
						<div class="col-6 col-12-medium">
							<!-- Text stuff -->
							<div>
								<form action="connect.php" method="POST">
									<div class="form-group">
										<!-- adresse email écrit pas l'utilisateur -->
										<label for="exampleInputEmail1">Adresse email</label><br>
										<input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
									</div>
									<br>
									<div class="form-group">
										<!-- le mdp écrit pas l'utilisateur -->
										<label for="exampleInputPassword1">Mot de passe</label><br>
										<input type="password" id="exampleInputPassword1" name="mdp">
									</div>
									<br>
									<!-- au cas ou l'utilisateur n'a pas de compte, il peut aller s'incrire -->
									<a href="subscribe.php">Je n'ai pas de compte</a>
									<br>
									<!-- le bouton se connecter -->
									<button id="btn-search" type="submit" value="envoyer2" name="ok">Se connecter</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!-- Contact -->
		<section id="contact">
			<div class="inner">
				<section>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" />
							</div>
							<div class="field half">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" />
							</div>
							<div class="field">
								<label for="message">Message</label>
								<textarea name="message" id="message" rows="6"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="primary" /></li>
							<li><input type="reset" value="Clear" /></li>
						</ul>
					</form>
				</section>

				<section class="split">
					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-envelope"></span>
							<h3>Email</h3>
							<a href="#">tchitombilaura@gmail.com <br> ankoumoug@gmail.com </a>
						</div>
					</section>

					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-phone"></span>
							<h3>Téléphone</h3>
							<span>(000) 000-0000 x12387</span>
						</div>
					</section>

					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-home"></span>
							<h3>Addresse</h3>
							<span>
								Paris<br />
								France</span>
						</div>
					</section>
				</section>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<ul class="icons">
					<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled</li>
					<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>