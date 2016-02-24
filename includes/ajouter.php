<?php
// inclure user.php et connect_bd.php dans chaque page ayant besoin des informations de l'utilisateur 
//require_once 'equipe.class.php';


if(isset($_POST['Ajouter']) &&isset($_POST['info']))
{
	try
	{
		$info = $_POST['info'];
		$equipe=Equipe::ajouter($_POST['info']);
	}
	catch(Exception $e)
	{
		$loginError=$e->getMessage();
	}
}
echo json_encode(['equipe' => $equipe]);
system.out.println($info);
?>