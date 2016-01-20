<?php
include_once '../includes/connect_bd.php';

if(isset($_POST) && isset($_POST['nom']) && isset($_POST['prenom'])
    && isset($_POST['mail']) && isset($_POST['motDePasse']) && isset($_POST['pseudo'])){

    if(get_magic_quotes_gpc()){
        $_POST['nom'] = stripslashes(trim($_POST['nom']));
        $_POST['prenom'] = stripslashes(trim($_POST['prenom']));
        $_POST['pseudo'] = stripslashes(trim($_POST['pseudo']));
        $_POST['mail'] = stripslashes(trim($_POST['mail']));
        $_POST['pseudo'] = stripslashes(trim($_POST['pseudo']));
        $_POST['motDePasse'] = stripslashes(trim($_POST['motDePasse'])); // cryptage bidon a améliorer
    }

    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) /*&& preg_match("/univ-amu\.fr|etu\.univ-amu\.fr$/", $_POST['mail'])*/) { // on vérfie si le mail est valide
        $id_utilisateur = ''; // en auto-incrément dans la bd
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $email = $_POST['mail'];
        $mot_passe = sha1($_POST['motDePasse']);

        if($i = $bd->prepare("
INSERT INTO utilisateur (idUtilisateur,nom,prenom,adresse_mail,motDePasse)
VALUES (:id_utilisateur,:nom,:prenom,:mail,:motDePasse)")
        )//pseudo a été retiré entre prenom et mail, ajout d'un avatar par défaut
            $i->bindParam(':idMembre', $id_utilisateur);
        $i->bindParam(':nom', $nom);
        $i->bindParam(':prenom', $prenom);
        $i->bindParam(':pseudo', $pseudo);
        $i->bindParam(':mail', $adresse_mail);
        $i->bindParam(':motDePasse', $mot_passe);



        $i->execute();

// redirection vers l'espace membre
        header('Location: index.php?continue=1&mail=' . $email);
    }
    else {
        header('Location: index.php?erreur=5');
    }

}
else {
    header('Location: index.php'); // on mettra ici une redirection vers le forumlaire avec un code erreur dans le lien
}