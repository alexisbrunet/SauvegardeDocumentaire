<?php 

session_start();

require '../includes/connect_bd.php';
require '../includes/user.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Thot - Equipes</title>
    <?php include_once '../includes/header.inc.php';
    include '../includes/count.inc.php'
    ?>
    <script type="text/javascript" src="../js/GestionEquipe.js"></script>
  </head>
  <body>
    <!-- DEBUT WRAPPER -->
    <div class="content-wrapper">
      <!-- DEBUT ENTETE -->
      <?php include '../includes/menu_membre.inc.php'; ?>
      <!-- FIN ENTETE --> 
    </div> 
    <!-- FIN WRAPPER -->

    <!-- DEBUT CONTENU -->
  
      <div class="content-wrapper"  >
          <div>
            <div class=" col-centered pull-right pull-top">
              <form action="#" id="Nouveau" method="post" role="form">
                <button name="Nouveau" type="submit" id="ajouter" class="btn btn-primary btn-form pull-right">Créer équipe</button>
              </form>
            </div> 
              <div class="col-xs-3 col-centered ">
                  <!-- First Column -->
                <div class="row">
                  <div >
                    <div >
                      <div >
                        <form>
                         <fieldset class="inline">
                          <?php
                          // lancement de la requête (on impose aucune condition puisque l'on désire obtenir la liste complète des propriétaires)
                          $pseudo = $user->getPseudo();
                          //$idequipe = 'SELECT id_equipe from appartenir a join utilisateur u on a.id_utilisateur = u.id_utilisateur where u.pseudo = '.'\$pseudo';
                          //$nomequipe = 'SELECT nom FROM equipe WHERE id_equipe ='.$idequipe; 
                          //$sql = 'SELECT pseudo FROM utilisateur u JOIN appartenir a ON u.id_utilisateur = a.id_utilisateur JOIN WHERE id_equipe = '.$idequipe;
                          global $bd;
                          $result2=$bd->prepare('SELECT e.nom from equipe e join appartenir a on e.id_equipe = a.id_equipe join utilisateur u on a.id_utilisateur = u.id_utilisateur where u.pseudo = ?');
                          $result2->execute(array($pseudo));
                          while ( $resultnomequipe =$result2->fetch())
                          {
                              echo '<legend>'.$resultnomequipe['nom'].'</legend> Membres: <br>';
                              $test=$resultnomequipe['nom'];
                              $result1=$bd->prepare('SELECT id_equipe FROM equipe e where e.nom= ?');
                              $result1->execute(array($test));

                              while ( $resultidequipe =$result1->fetch())
                              {
                                $idequipe = $resultidequipe['id_equipe'];
                                $_SESSION['test'] = $idequipe;
                                $_GET['id_equipe'] = $idequipe;
                                echo $_GET['id_equipe'];
                              }
                              $result3=$bd->prepare('SELECT pseudo FROM utilisateur u JOIN appartenir a ON u.id_utilisateur = a.id_utilisateur WHERE a.id_equipe in (SELECT a.id_equipe from appartenir a JOIN equipe e on a.id_equipe = e.id_equipe join utilisateur u on a.id_utilisateur = u.id_utilisateur where e.nom = ? and u.pseudo = ? )'); 
                              $result3->execute(array($test, $pseudo));
                              while ( $resultmembrequipe =$result3->fetch()){
                                echo ($resultmembrequipe['pseudo']).'<br />' ;
                              }
                               
                              require_once '../includes/equipe.class.php';
                              include '../includes/boutonsEquipe.php';
                              
                              if(isset($_POST['Ajouter']) &&isset($_POST['info']))
                              {
                                $info = $_GET['info'];
                                $equipe=Equipe::ajouter($_GET['info']);
                                echo $info;
                              }                         
                               //echo $equipe= ajouter($info);
                               //echo $info;
                               //echo $info = $_POST['info']; 
                               
                          }
                          ?>
                        </fieldset>
                      </form>
                      </div>        
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>       
      <!-- FIN CONTENU -->
    <!-- Includes JS liées à la page -->
  <?php 
  //includes js générales + footer
  include '../includes/footer.inc.php' ?>
  <script type="text/javascript">
    if(getUrlParameter('erreur') == 6)
      $.growl("Vous ne pouvez pas accéder à cette page.");
  </script>
  //   <script>
  //   $('#ajouter').click(function(){$.post('ajouter.php',
  //     function(data){$('#ajouter').html(data)
  //     });
  // })
  //   </script>
    </body>
</html>