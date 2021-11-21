<?php
	session_start();
	//inclure les pages de function et de la barre de navigation
	include 'function.php';
	$bdd = connexion();
	function debug($variable)
	{
		echo '<pre>' . print_r($variable, true) . '</pre>';
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
			<a href="index.html" class="logo"><strong>Site de reservation</strong> <span>M2L</span></a>
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
						<h1>Inscrivez-vous !</h1>

						<?php
						//si le bouton s'inscrire est enclencher
						if (isset($_POST["confirm"])) {
							//on verifie si les inputs sont vides
							if (verify($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["mdp"], $_POST["adresse"], $_POST["complement"], $_POST["ville"], $_POST["cpostal"], $_POST["pays"])) {
								//on recupère et met les informations dans des variables
								$nom = $_POST["nom"];
								$prenom = $_POST["prenom"];
								$email = $_POST["email"];
								$mdp = $_POST["mdp"];
								$adresse = $_POST["adresse"];
								$complement = $_POST["complement"];
								$ville = $_POST["ville"];
								$cpostal = $_POST["cpostal"];
								$pays = $_POST["pays"];

								//connexion à la base de donnée en fesant appel à la function correspondante
								$bdd = connexion();
								//on verifie si l'email a déjà utilisé pour une inscription précédente 
								if (mailVerif1($email)) {
									//insertion des données dans la base de donnée
									$requete = "INSERT INTO user(nom,prenom,email,adresse,complement,mdp,cpostal,ville,pays) VALUES (?,?,?,?,?,?,?,?,?)";
									$load = $bdd->prepare($requete);
									// $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
									$exe = $load->execute(array($nom, $prenom, $email, $adresse, $complement, $mdp, $cpostal, $ville, $pays));
									if ($exe) {
										//si l'inscription est réussite
										echo "Inscription réussite";
									} else {
										//si l'inscription a échouée
										echo "Inscription échouée";
									}
								} else {
									//si l'email a déjà été utilisé
									$sms = "L'émail est déjà utilisé, veuillez renseigner un nouveau";
									echo $sms;
								}
							} else {
								//si l'un des input est vide
								echo "L'un des champs est vide, veuillez reprendre";
							}
						}
						?>

					</header>
					<!-- Elements -->

					<div class="row gtr-200">
						<div class="col-6 col-12-medium">

							<!-- Text stuff -->

							<div>
								<form action="subscribe.php" method="POST">
									<div class="form-row">
										<div class="form-group">
											<label for="inputfirstname4">Prénom : </label>
											<input type="text" id="inputfirstname4" name="prenom" required>
										</div>
										<div class="form-group">
											<label for="inputlastname4">Nom : </label>
											<input type="text" id="inputlastname4" name="nom" required>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group">
											<label for="inputEmail4">Email : </label>
											<input type="text" id="inputEmail4" name="email">
										</div>
										<div class="form-group">
											<label for="inputPassword4">Mot de passe : </label>
											<input type="password" id="inputPassword4" name="mdp">
										</div>
										<br>
									</div>

									<div class="form-row">
										<div class="form-group">
											<label for="inputAddress">Adresse : </label>
											<input type="text" id="inputAddress" placeholder="28 Main St" name="adresse">
										</div>
										<div class="form-group">
											<label for="inputAddress2">Complément : </label>
											<input type="text" id="inputAddress2" placeholder="Appartment, studio,..." name="complement">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group">
											<label for="inputCity">Ville : </label>
											<input type="text" id="inputCity" name="ville">
										</div>
										<div class="form-group">
											<label for="inputZip">Code postal : </label>
											<input type="text" id="inputZip" name="cpostal">
										</div>
									</div>

									<div class="form-group">
										<div class="form-group">
											<label for="inputState">Pays : </label>
											<select id="inputState" name="pays">
												<option selected>FRANCE</option>
												<option>Belgique</option>
												<option>Espagne </option>
												<option>Angleterre</option>
												<option>Sénégal</option>
												<option>...</option>
											</select>
										</div>
									</div>
									<a href="connect.php">J'ai déjà un compte</a>

									<!-- <input type="text" id="gridCheck" value="check" name="vcondition" class="box1">
															conditions  -->

									<br><br>
									<button id="btn-search" type="submit" value="envoyer" name="confirm">S'inscrire</button>
								</form>
							</div>

						</div>
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
										<span>Paris<br />
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