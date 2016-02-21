 <?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "thotbdd";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
// } 

// $sql = "SELECT * from utilisateur";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
        // echo "$row[id_utilisateur] $row[nom]";
		// echo "<br>";
    // }
// } else {
    // echo "0 results";
// }
// $conn->close();
?>

<?php include '../includes/verif.php';
  include 'create.php'; 
    if (isset($user))
  $connected = True;
    else  
  $connected = False;
 ?>
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
      <?php if (! $connected){
        include '../includes/menu_invite.inc.php'; 
      }
      else
     include '../includes/menu_membre.inc.php';    
     ?>
      <!-- FIN ENTETE --> 
    </div> 
    <!-- FIN WRAPPER -->

    <!-- DEBUT CONTENU -->
  
      <div class="container"  >
       <?php if(isset($RegisterError)): ?>
       <tr><td colspan="2" class="error"><?=$RegisterError?> !</td></tr>
        <?php endif; ?>

     <?php if(isset($loginError)): ?>
     <span class="error"><?=$loginError?></span>
      <?php endif; ?>
          <div class="row row-centered">
              <div class="col-xs-6 col-centered col-fixed">
                  <!-- First Column -->
                <div class="row">
                    <!-- test if connected include userCol ou guestCol --> 
                    <?php if (! $connected){
                      include '../includes/guestCol.inc.php'; 
                    }
                    else
                     include '../includes/dossiercol.inc.php';
                   ?>
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