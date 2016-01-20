<?php
session_start(); 
if(isset($_SESSION['id_utilisateur'])) {
    $connected = true;
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $pseudo = $_SESSION['pseudo'];
    $nomAffichage = $pseudo . ".";
}
else {
    $connected = false;
}