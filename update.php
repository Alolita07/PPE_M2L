<?php
session_start();
#connexion à fonctions.php pour la connexion à la base de données
require 'function.php';
#On se connecte à la base de données
$bdd = connexion();
$id = $_GET["NumReserv"];
$requette = "SELECT * FROM reservation WHERE NumReserv= $id";
$resultat = $bdd->query($requette);
// $row = $resultat->fetch(PDO::FETCH_ASSOC);
// echo "$id";
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
                <a href="index.html">Retour</a>
                <a href="#menu">Menu</a>
            </nav>
        </header>
        <?php
        //une condition permettant d'aller récupérer chaque ligne de la table adhérent de la base de donnée
        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <!--Le formulaire-->
            <form action="modifier.php?NumReserv=<?php echo $ligne["NumReserv"] ?>" method="post">
                <div>
                    <label>Nom de la salle : </label>
                    <select class="form-control" id="nom" name="nom" required autofocus>
                        <option selected><?php echo $ligne["NomSalle"]; ?></option>
                        <option>Athènes</option>
                        <option>Genève</option>
                        <option>Luxembourg </option>
                        <option>Amsterdam</option>
                        <option>Londres</option>
                    </select>
                </div>
                <div>
                    <label>Nom du formateur:</label>
                    <select class="form-control" id="prenom" name="prenom" required>
                        <option selected><?php echo $ligne["NomFormateur"]; ?></option>
                        <option>Laura</option>
                        <option>Antoine</option>
                        <option>Adam </option>
                        <option>Toure</option>
                        <option>Ikram</option>
                    </select>
                </div>
                <div>
                    <label>Date de la formation:</label>
                    <input type="text" id="adresse" value="<?php echo $ligne["DateFormation"]; ?>" name="adresse">
                </div> <br>
                <div>
                    <button class="bouton" name="ok">Enregistrer</button>
                </div>
            <?php
        }
            ?>
            </form>
</body>

</html>