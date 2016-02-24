<?php
class Equipe
{
	private $_nom;
	
	
	public function getNom(){
		return $this->_nom;
	}
	
	public function setter($nom)   // constructeur equipe vérifie l'intégrité des champs
	{
  	$error="";
  	$error.=self::checkNom($nom);
  	if(!empty($error))
  		throw new Exception(substr($error,0,-2));
  	$this->_nom=$nom;
	}
	
  public function __construct($name)
  {
  	$this->_nom=$name;
  }
  
  public static function withRow($name)
  {
  	$error="";
  	$error.=self::checkNom($name);
  	if(!empty($error))
  		throw new Exception(substr($error,0,-2));
		return new self($name);
	}
	
	public function save()
	{
		global $bd;
		$query=$bd->prepare('INSERT INTO equipe SET nom=? ON DUPLICATE KEY UPDATE nom=?');
		$query->execute(array($this->_nom,$this->_nom));
	}
	
	public function delete()
	{
		global $bd;
		$query=$bd->prepare('DELETE FROM equipe where nom=?');
		$query->execute(array($this->_nom));
	}
	
	
	private static function checkNom($name)
	{
		if(!is_string($name) OR !ctype_alnum($name) OR strlen($name)>32 )
			return "nom invalide, ";
	}

	public static function ajouter($info){
  	if(!is_string($info))
  		{throw new Exception("entrée invalide");}
	global $bd;
	$query=$bd->prepare('SELECT id_utilisateur FROM utilisateur WHERE adresse_mail=? or pseudo=?');
	$query->execute(array($info, $info));
	$user=$query->fetch();

  	if(!$user)
  		{throw new Exception("Mail ou mot de passe invalide");}
  	$iduser = $user['id_utilisateur'];
  	global $bd;
  	$coucou = $_SESSION['test'];
	$insert=$bd->prepare('INSERT INTO appartenir VALUES(id_utilisateur=?, id_equipe=?)');
	$insert->execute(array($iduser,  $_SESSION['test']));
	$pseudouser=$bd->prepare('SELECT pseudo FROM utilisateur where id_utilisateur=?');
	$pseudouser->execute(array($iduser));
	//return $pseudouser;
	return "okay";
	}
}
?>