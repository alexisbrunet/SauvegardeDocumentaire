<?php
include_once '../includes/connect_bd.php';
if(isset($_POST["mail"])){
    $email = strtolower(stripslashes(trim($_POST['mail'])));
    
    $query = $bd->prepare('SELECT mail FROM ??? WHERE LOWER(mail) = \'' . $email . '\''); //A modifier
    $query->execute();
    $donnees = $query->fetch();
    echo $donnees[0];
}
    
