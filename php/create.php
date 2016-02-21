<?php
//session_start();
include_once '../includes/connect_bd.php';
require_once '../includes/user.class.php';



if(isset($_POST['Rejoindre']) && isset($_POST['nom']) && isset($_POST['prenom'])
    && isset($_POST['mail']) && isset($_POST['motDePasse']) && isset($_POST['pseudo'])){

    try
    {
        $user=User::withRow($_POST['nom'],$_POST['pseudo'],$_POST['mail'],$_POST['prenom'],$_POST['motDePasse']);
        $user->save();
        $_SESSION['login']=$user->getPseudo();
        
        
    }   
    catch(Exception $e)
    {
        $RegisterError=$e->getMessage();
    }


  }  
else {
    require '../includes/user.php';
 }
 ?>
