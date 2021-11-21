<?php
    /**
    * Gère la connexion à la base de données
    * @return PDO Objet de connexion à la BD
    */
    function connexion() {
        return new PDO("mysql:host=localhost;dbname=bddm2l;charset=utf8","root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    function verify($name,$surname,$mail,$password,$adress,$compliment,$town,$zip,$country) {
        if (!empty($name) && !empty($surname) && !empty($mail) && !empty($password) && !empty($adress) && !empty($compliment) && !empty($town) && !empty($zip) && !empty($country)) {
            return true;
        }
        else {
            return false;
        }
    }

    function vconn($nam, $surnam)
    {
        if (!empty($nam) && !empty($surnam)) {
            return true;
        } 
        else {
            return false;
        }
    }

    function mailVerif($vmail)
    {
        $bdd = connexion();
        $req = "SELECT id FROM user WHERE email=?";
        $load = $bdd->prepare($req);
        $load->execute(array($vmail));
        $count = $load->rowCount();
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }
    function mailVerif1($vmail) {
        $bdd = connexion();
        $req="SELECT id FROM user WHERE email=?";
        $load=$bdd->prepare($req);
        $load->execute(array($vmail));
        $count = $load->rowCount();
        if ($count == 0) {
            return true;
        }
        else {
            return false;
        }
    }
?>