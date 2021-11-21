<?php
include "function.php";
$bdd = connexion();
// Condition
if (isset($_POST["oki"])) {
	//Récupération des valeurs du formulaire
	$nom = $_POST["nom"];
	$auteur = $_POST["auteur"];
	$date = $_POST["date"];
	#la requette d'ajout
	$requette = "INSERT INTO reservation (NomSalle,NomFormateur,DateFormation) VALUES (?,?,?)";
	#On execute la requette 
	$load = $bdd->prepare($requette);
	// $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
	$exe = $load->execute(array($nom, $auteur, $date));
	if ($exe) {
		//si l'inscription est réussite
		echo "Réservation réussite";
	} else {
		//si l'inscription a échouée
		echo "Réservation échouée";
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
						<h1>Réserver une salle</h1>
					</header>

					<form action="elements.php" method="post">
						<!-- Elements -->
						<div class="row gtr-200">
							<div class="col-6 col-12-medium">
								<!-- Text stuff -->
								<div class="row">
									<div class="form-group col-xs-6">
										<label for="e1">Nom de la salle </label>
										<select class="form-control" id="nom" name="nom" required autofocus>
											<option selected>Athènes</option>
											<option>Genève</option>
											<option>Luxembourg </option>
											<option>Amsterdam</option>
											<option>Londres</option>
										</select>
									</div>
									<div class="form-group col-xs-6">
										<label for="e2">Nom du formateur </label>
										<select class="form-control" id="auteur" name="auteur" required>
											<option selected>Laura</option>
											<option>Antoine</option>
											<option>Adam </option>
											<option>Toure</option>
											<option>Ikram</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="e4">Date de la formation</label>
									<input type="text" class="form-control" id="date" name="date" required placeholder="YYYY/MM/DD">
								</div>
								<br>
								<button type="submit" class="btn btn-primary btn-block" name="oki" value="send">Valider</button>
								<hr />
							</div>
						</div>
					</form>

					<!-- Récupération de la liste des réservations  -->
					<div class="grid">
						<table cellspacing="0">
							<thead>
								<tr>
									<th>N° réservation</th>
									<th>Nom de la Salle</th>
									<th>Nom du formateur</th>
									<th>date de la formation</th>
									<th colspan="2">Les actions</th>
								</tr>
							</thead>
							<?php
							#la requette d'affichage
							$requette1 = "SELECT * FROM reservation";
							#On execute la requette 
							$resultat1 = $bdd->query($requette1);
							# On récupère les résultats de la requête et on les mets dans le tableau
							while ($ligne = $resultat1->fetch(PDO::FETCH_ASSOC)) {
							?>
								<tbody>
									<tr>
										<td>
											<?= $ligne["NumReserv"]; ?>
										</td>
										<td>
											<?= $ligne["NomSalle"]; ?>
										</td>
										<td>
											<?= $ligne["NomFormateur"]; ?>
										</td>
										<td>
											<?= $ligne["DateFormation"]; ?>
										</td>
										<td>
											<a href="delete.php?NumReserv=<?php echo $ligne['NumReserv'] ?>" onclick="return(confirm('Etes-vous sûr de votre choix ?'))">Supprimer</a>
											&nbsp;
											<a href=" update.php?NumReserv=<?php echo $ligne['NumReserv'] ?>">Modifier</a>
										</td>
									</tr>
								</tbody>
							<?php
							}
							?>
						</table>
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
								Paris
								<br />
								France
							</span>
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
					<li><a href="https://github.com/Alolita07" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
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