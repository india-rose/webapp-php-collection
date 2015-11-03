<?php
class Utilisateur
{
	/* Les attributs */
	private $_iduser;
	private $_nom;
	private $_prenom;		
	private $_login;
	private $_password;
	private $_email;
	private $_settings;
	
	/* Constructeurs par affectation */
	public function __construct(array $aDonnees)
	{
		$this -> hydrate($aDonnees);
	}

	public function hydrate(array $aDonnees)
	{	
		foreach($aDonnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
				if(method_exists($this, $method))
				{
					$this -> $method($value);
				}
		}
	}
	
		///////////////// Méthode pour afficher les informations d'un utilisateur /////////////////
	 public function AfficherUtilisateur()
	 {
		return 'Id: '.$this -> getIdUser().' | Nom: '.$this -> getNom().' | Prenom: '.$this -> getPrenom().' | Login: '.$this -> getLogin().' | Password: '.$this -> getPassword().' | Settings: '.$this -> getSettings().'<br />';
	 }
	 
	/* Getters */
	public function getIdUser() { return $this -> _iduser; }
	public function getNom() { return $this -> _nom; }
	public function getPrenom() { return $this -> _prenom; }
	public function getLogin() { return $this -> _login; }
	public function getPassword() { return $this -> _password; }		
	public function getEmail() { return $this -> _email; }
	public function getSettings() { return $this -> _settings; }	
	
	/* Setters */
	public function setIdUser($iduser)
	{
		$iduser = (int)$iduser;
		$this -> _iduser = $iduser; 
	}
	
	public function setNom ($nom)
	{		
		if(is_string($nom))  
		{ 
			$this -> _nom = $nom; 
		}
	}
	
	public function setPrenom($prenom)
	{
		if(is_string($prenom))
		{
			$this -> _prenom = $prenom;	
		}
	}
	
	public function setLogin($login)
	{
		if(is_string($login))
		{
			$this -> _login = $login;	
		}
	}	
	
	public function setPassword($password)
	{
		if(is_string($password))
		{
			$this -> _password = $password;	
		}
	}
	
	public function setEmail($email)
	{
		if(is_string($email))
		{
			$this -> _email = $email;	
		}
	}
	
	public function setSettings($settings)
	{
		if(is_string($settings))
		{
			$this -> _settings = $settings;	
		}
	}
}
?>