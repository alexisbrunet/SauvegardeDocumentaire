<?php include '../includes/verif.php'; ?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Thot - Index</title>
    <?php include_once '../includes/header.inc.php';
    include '../includes/count.inc.php'
    ?>
  </head>
  <body>
    <!-- DEBUT WRAPPER -->
    <div class="content-wrapper">
      <!-- DEBUT ENTETE -->
      <?php if ($connected){
        include '../includes/menu_membre.inc.php';
      }
      else
        include '../includes/menu_invite.inc.php'; ?>
      <!-- FIN ENTETE --> 
    </div> 
    <!-- FIN WRAPPER -->

    <!-- DEBUT CONTENU -->
  
      <div class="container"  >
          <div class="row row-centered">
              <div class="col-xs-6 col-centered col-fixed">
                  <!-- First Column -->
                <div class="row">
                  <?php if ($connected)
                      include '../includes/userCol.inc.php';
                    else
                      include '../includes/guestCol.inc.php'; ?>
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