<?php
include_once '../includes/connect_bd.php';
if(isset($_POST) && isset($_POST['mail']) AND isset($_POST['passe'])){
    $y = $bd->prepare('SELECT COUNT(*) FROM utilisateur WHERE mail = ?');
    $y->execute(array($_POST['mail']));
    $x = $y->fetch();

    if ($x[0] == 0){
        header('Location: index.php?erreur=3');
    } else {
        $e = $bd->prepare('SELECT mot_de_passe FROM utilisateur WHERE mail = ?'); // A modifier
        $e->execute(array($_POST['mail']));
        $rep = $e->fetch();

        $passe = sha1($_POST['passe']);

        if ($passe == $rep['mot_de_passe']){
            session_start();
            $_SESSION['adresse_mail'] = $_POST['mail'];
            $mail = $_POST['mail'];

            $query = $bd->prepare('SELECT id-utilisateur,nom,prenom,pseudo FROM utilisateur WHERE mail = ?'); // A modifier
            $query->execute(array($_POST['mail']));
            $donnees = $query->fetch();

            /*while ($donnees = $reponse->fetch())
            {*/
                //echo $donnees['nom'];
                //echo $donnees['prenom'];
                $_SESSION['id_utilisateur'] = $donnees['id_utilisateur']; // A modifier
                $_SESSION['nom'] =  $donnees['nom'];
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['pseudo'] = $donnees['pseudo'];
            //}

            header('Location: index.php');
        }else{
            header('Location: index.php?erreur=2');
        }
    }
}