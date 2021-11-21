<?php
session_start();
//On recupere les valeurs du formulaire
include 'function.php';
$bdd= connexion();
if(isset($_POST["ok"])){
    $salle=$_POST["nom"];
    $formateur=$_POST["prenom"];
    $date=$_POST["adresse"];
    $id = $_GET["NumReserv"];
    $sql = "UPDATE reservation SET NomSalle = '$salle', NomFormateur='$formateur', DateFormation='$date' WHERE NumReserv='$id'";
    $resultat=$bdd->query($sql);
    #Message de confirmation de la modification
    if ($resultat){
    echo 'Modification effectuée avec succès !!';
    header("location:elements.php");
    
    // header("location:elements.php");
    }else {
    echo 'Modification non effectuée :(';
    header("location:update.php");
    }
}
?>