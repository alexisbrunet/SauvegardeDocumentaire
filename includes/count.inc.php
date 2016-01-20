<?php
include_once '../includes/connect_bd.php';
            $query = $bd->prepare('SELECT COUNT(id_utilisateur) FROM utilisateur');
            $query->execute();
            $donnees = $query->fetch();
            $nbMembres = $donnees[0];

		
            //$trips = $bd->prepare('');
            //$trips->execute();