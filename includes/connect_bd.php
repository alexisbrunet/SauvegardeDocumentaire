<?php
// Connection au serveur
try {
    $dns = 'mysql:host=localhost;dbname=thottbdd';
    $utilisateur = 'root'; // a modifier
    $motDePasse = 'root'; // a modifier
    $bd = new PDO( $dns, $utilisateur, $motDePasse );
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // permet l'affichage des erreurs php <3
} catch ( Exception $e ) {
    echo "Connection à MySQL impossible : ", $e->getMessage();
    die();
}
