<?php
// inclure user.php et connect_bd.php dans chaque page ayant besoin des informations de l'utilisateur 
require_once 'user.class.php';
if(isset($_SESSION['login']))
{
		try
	{
		$user=User::withLogin($_SESSION['login']);
		
	}
	catch(Exception $e)
	{
		unset($_SESSION['login']);
		$loginError=$e->getMessage();
	}
}
elseif(isset($_POST['info'])&& isset($_POST['motDePasse2']) && isset($_POST['Connecter']))
{
	try
	{
		$user=User::withLoginPass($_POST['info'],$_POST['motDePasse2']);
		
		$_SESSION['login']=$user->getPseudo();
	}
	catch(Exception $e)
	{
		$loginError=$e->getMessage();
	}
}
?>