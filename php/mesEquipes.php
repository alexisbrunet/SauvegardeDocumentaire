<?php 
include '../includes/connect_bd.php';
include '../includes/verif.php'; ?>
<?php
require '../includes/equipe.class.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Thot - Equipes</title>
    <?php include_once '../includes/header.inc.php';
    include '../includes/count.inc.php'
    ?>
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
  
      <div class="container"  >
          <div class="row row-centered">
              <div class="col-xs-6 col-centered col-fixed">
                  <!-- First Column -->
                <div class="row">
                  <div >
                    <div id="block-profil" class="row profil-noco">
                      <div id="block-infos" class="row">
                        <form>
                         <fieldset>
                          <legend>Groupe</legend>

                          Nom du groupe: <input type="text" name="nom" value="<?=$equipe->getNom()?>"><br>
                          Membres: <input type="text"><br>
                          <?php
                          // lancement de la requête (on impose aucune condition puisque l'on désire obtenir la liste complète des propriétaires
                          $idequipe = 'SELECT id_equipe FROM appartenir WHERE id_utilisateur = $session['id_utilisateur']';
                          $sql = 'SELECT pseudo FROM (utilisateur JOIN appartenir) ON utilisateur.id_utilisateur = appartenir.id_utilisateur )JOIN id_equipe = $idequipe';

                          // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
                          $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

                          // on va scanner tous les tuples un par un
                          while ($data = mysql_fetch_array($req)) {
                          // on affiche les résultats
                            echo $data['pseudo'].'<br />';
                          }
                          mysql_free_result ($req);
                          mysql_close ();
                          ?>
                        </fieldset>
                      </form>
                      </div>        
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- FIN CONTENU -->
    <!-- Includes JS liées à la page -->
  <?php 
  if($connected) 
    echo '<script src="../js/connected.js"></script>';
  //includes js générales + footer
  include '../includes/footer.inc.php' ?>
  <script type="text/javascript">
    if(getUrlParameter('erreur') == 6)
      $.growl("Vous ne pouvez pas accéder à cette page.");
  </script>  </body>
</html>