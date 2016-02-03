<?php
session_start();

require '../includes/connect_bd.php';
require '../includes/user.php';
if(!isset($user))
	die('Vous devez être connecté pour voir cette page');
if(isset($_POST['deleteAccount']))
{
	$user->delete();
	session_destroy();
	header ('Location: index.php');
	exit();
}
elseif(isset($_POST['editAccount'],$_POST['nom'],$_POST['mail'],$_POST['prenom']))
{
	try
	{
		if(isset($_POST['motDePasse']))
			$user->modifAll( $_POST['nom'],$_POST['prenom'],$_POST['mail'], $_POST['motDePasse'] );
			

		else
			$user->modifNoMDP( $_POST['nom'],$_POST['prenom'],$_POST['mail'] );
		
	header ('Location: index.php');	

	
	}
	catch(Exception $e)
	{
		$EditError=$e->getMessage();
	}
	
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Mon Profil</title>
    <?php include_once '../includes/header.inc.php';
    include '../includes/count.inc.php'
    ?>
  </head>
<body>

<div class="content-wrapper">
<?php  include '../includes/menu_membre.inc.php'; ?>
</div>
<div class="container" >
	<div class="row row-centered">
		<div class="col-xs-6 col-centered col-fixed">
			<form method="post">
				<?php if(isset($EditError)): ?>
				 <div class="error"><?=$EditError?></div>
				<?php endif; ?>
					<table>
					<tr>
					<td><label>Pseudo :</label></td>
					<td><?=$user->getPseudo()?> (vous ne pouvez pas le modifier)</td>
					</tr><tr>
					<td><label>Nom</label></td>
					<td><input type="text" name="nom" value="<?=$user->getNom()?>"></td>
					</tr><tr>
					<td><label>Mail</label></td>
					<td><input type="text" name="mail" value="<?=$user->getMail()?>"></td>
					</tr><tr>
					<td><label>Prenom</label></td>
					<td><input type="text" name="prenom" value="<?=$user->getPrenom()?>"></td>
					</tr><tr>
					<td><label>Mot de passe</label></td>
					<td><input onclick="this.checked ? document.getElementById('pass').disabled=false : document.getElementById('pass').disabled=true" type="checkbox">
					<input id="pass" type="password" name="motDePasse" placeholder="●●●●●●●" disabled></td>
					</tr>
					</table>
					<br>
					<input name="editAccount" class="button rightcontrol" type="submit" value="Modifier"/>
					<input name="deleteAccount" class="button rightcontrol" type="submit" value="Supprimer le compte"/>
					<input type="button" value="Annuler" onclick="window.location.href='index.php';" />
			</form>
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
</body>
</html>