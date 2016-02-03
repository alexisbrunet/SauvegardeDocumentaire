<?php
class User
{
	private $_adresse_mail;
	private $_nom;
	private $_prenom;
	private $_pseudo;
	private $_mot_de_passe;
	
	public function getPseudo(){
		return $this->_pseudo;
	}
	
	public function getNom(){
		return $this->_nom;
	}
	
	public function getMail(){
		return $this->_adresse_mail;
	}
	
	
	public function getPrenom(){
		return $this->_prenom;
	}
	
	
	public function setter($nom, $prenom, $mail, $pseudo, $password)   // setter utilisateur vérifie l'intégrité des champs
	{
  	$error="";
  	$error.=self::checkNom($nom);
	$error.=self::checkPrenom($prenom);
  	$error.=self::checkMail($mail);
  	$error.=self::checkPseudo($pseudo);
  	$error.=self::checkPassword($password);
  	if(!empty($error))
  		throw new Exception(substr($error,0,-2));
  	$this->_nom=$nom;
	$this->_prenom=$prenom;
		$this->_adresse_mail=$mail;
		$this->_pseudo=$pseudo;
		$this->_mot_de_passe=password_hash($password, PASSWORD_DEFAULT);
	}
	
	public function setterNoPass($name, $mail, $prenom)
	{
  	$error="";
  	$error.=self::checkNom($name);
  	$error.=self::checkMail($mail);
  	$error.=self::CheckPrenom($prenom);
  	if(!empty($error))
  		throw new Exception(substr($error,0,-2));
  	$this->_nom=$name;
		$this->_adresse_mail=$mail;
		$this->_prenom=$prenom;
	}
	
  public function __construct($name, $login, $mail, $prenom, $mot_de_passe) //constructeur
  {
  	$this->_nom=$name;
		$this->_adresse_mail=$mail;
		$this->_pseudo=$login;
		$this->_prenom=$prenom;
		$this->_mot_de_passe=$mot_de_passe;
  }
  
  public static function withRow($name, $login, $mail, $prenom, $password) // retourne une instance user après vérif des champs
  {
  	$error="";
  	$error.=self::checkNom($name);
  	$error.=self::checkPseudo($login);
  	$error.=self::checkMail($mail);
  	$error.=self::CheckPrenom($prenom);
  	$error.=self::checkPassword($password);
  	if(!empty($error))
  		throw new Exception(substr($error,0,-2));
		return new self($name, $login, $mail, $prenom, $password); // password_hash($password, PASSWORD_DEFAULT)
	}
	
	public static function withLoginPass($info, $password)  // script pour la connexion avec mail ou pseudo et mot de passe, renvoie une instance user avec les informations du compte
  {
  	if(!is_string($info) OR !is_string($password))
  		{throw new Exception("entrée invalide");}
	global $bd;
	$query=$bd->prepare('SELECT * FROM utilisateur WHERE adresse_mail=? or pseudo=?');
	$query->execute(array($info, $info));
	$user=$query->fetch();

  	if(!$user) // OR !password_verify($password,$user['mot_de_passe'])
  		{throw new Exception("Mail ou mot de passe invalide");}
	return new self($user['nom'], $user['pseudo'], $user['adresse_mail'], $user['prenom'], $user['mot_de_passe']);
	}
	
	public static function withLogin($login)  // script pour la connexion avec le pseudo, renvoie une instance user avec les informations du compte
  {
		global $bd;
		$query=$bd->prepare('SELECT * FROM utilisateur WHERE pseudo=?');
		$query->execute(array($login));
		$user=$query->fetch();
		if(!$user)
		  throw new Exception("erreur de connection");
		return new self($user['nom'], $user['pseudo'], $user['adresse_mail'], $user['prenom'], $user['mot_de_passe']);
	}
	
	public function save() // enregistre une instance user dans la BD, table utilisateur
	{
		global $bd;
		$query=$bd->prepare('INSERT INTO utilisateur SET nom=?,pseudo=?,adresse_mail=?,prenom=?,mot_de_passe=? ON DUPLICATE KEY UPDATE nom=?,adresse_mail=?,prenom=?,mot_de_passe=?');
		$query->execute(array($this->_nom, $this->_pseudo, $this->_adresse_mail, $this->_prenom, $this->_mot_de_passe,$this->_nom, $this->_adresse_mail, $this->_prenom, $this->_mot_de_passe));
	}
	
	public function modifAll( $nom, $prenom, $mail, $passe ){   // modifie les informations d'un utilisateur sauf son pseudo
		global $bd;
		$error="";
		$error.=self::checkNom($nom);
		$error.=self::checkMail2($mail);
		$error.=self::CheckPrenom($prenom);
		$error.=self::checkPassword($passe);
		if(!empty($error))
  		throw new Exception(substr($error,0,-2));
		$query=$bd->prepare('Update utilisateur SET nom=?,adresse_mail=?,prenom=?,mot_de_passe=? where pseudo=?');
		$query->execute(array($nom, $mail, $prenom, $passe, $this->_pseudo)); //password_hash($passe, PASSWORD_DEFAULT)
	}
	
		public function modifNoMDP( $nom, $prenom, $mail ){  // modifie les informations d'un utilisateur sauf son pseudo et mdp
		global $bd;
		$error="";
		$error.=self::checkNom($nom);
		$error.=self::checkMail2($mail);
		$error.=self::CheckPrenom($prenom);
		
		if(!empty($error))
  		throw new Exception(substr($error,0,-2));
		$query=$bd->prepare('Update utilisateur SET nom=?,adresse_mail=?,prenom=? where pseudo=?');
		$query->execute(array($nom, $mail, $prenom, $this->_pseudo));
	}
	
	
	public function delete() // supprime user de la bd
	{
		global $bd;
		$query=$bd->prepare('DELETE FROM utilisateur where pseudo=?');
		$query->execute(array($this->_pseudo));
	}
	

	//vérification
	
	private static function checkNom($name)
	{
		if(!is_string($name) OR !ctype_alnum($name) OR strlen($name)>32 )
			return "nom invalide, ";
	}
	
	private static function checkPseudo($login)
	{
		if(!is_string($login) OR !ctype_alnum($login) OR strlen($login)>32 or filter_var($login, FILTER_VALIDATE_EMAIL)!==false)
			return "Pseudo invalide, ";
		else
		{
			global $bd;
			$query = $bd->prepare('SELECT pseudo FROM utilisateur WHERE pseudo=?');
			$query->execute(array($login));
			if($query->fetchColumn())
				return "Pseudo existe déjà, ";
		}
	}
	
	private static function checkMail($mail)
	{
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
			return "email invalide, ";
		else
		{
			global $bd;
			$query = $bd->prepare('SELECT adresse_mail FROM utilisateur WHERE adresse_mail=?');
			$query->execute(array($mail));
			if($query->fetchColumn())
				return "L'email a deja un compte, ";
		}
	}
	
	private static function checkMail2($mail)
	{
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
			return "email invalide, ";
		
	}
	
	private static function checkPrenom($prenom)
	{
		if(!is_string($prenom) OR !ctype_alnum($prenom) OR strlen($prenom)>32 )
			return "prenom invalide, ";
	}
	
	private static function checkPassword($password)
	{
		if(!is_string($password) OR strlen($password)<4)
			return "mot de passe trop court, ";
	}

}
?>