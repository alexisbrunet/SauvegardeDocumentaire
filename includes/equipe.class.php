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
}
?>