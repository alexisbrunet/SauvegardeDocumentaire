<div >
  <div id="block-profil" class="row profil-noco">
    <div id="block-infos" class="row">
      <h1>Liste de vos fichiers</h1>
            <p> <?php
			$nom = $user->getNom();
			$mail = $user->getMail();
			
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "thotbdd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "SELECT * from utilisateur where nom = '$nom'"; //Penser à mettre la bonne requête, ici requête de test pour l'affichage

$sql = "SELECT *
FROM fichier JOIN autorisation_fichier ON fichier.id_fichier = autorisation_fichier.id_fichier
WHERE id_utilisateur = (SELECT id_utilisateur FROM utilisateur WHERE nom = '$nom' and adresse_mail = '$mail')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
		
    while($row = $result->fetch_assoc()) {
		
		echo "<a href='../$row[chemin_relatif]' download='$row[titre]$row[extention]' ><img src='../pictures/fic.jpg' height='35' width='35'></a>"; //Ne pas oublier de changer le lien, et y mettre le chemin du fichier
		echo " ";
	    echo "$row[titre]$row[extention]";

        // echo "$row[id_utilisateur] $row[nom]";
		echo "<br>";
    }
} else {
    echo "Aucun fichier trouvé";
}
$conn->close();
?>
</p>
    </div>        
  </div>
</div>