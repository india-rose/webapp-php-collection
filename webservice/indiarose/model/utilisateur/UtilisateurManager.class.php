<?php
class UtilisateurManager
{
	/* Instance de l'objet PDO */	
	private $_db;
	
	public function __construct($db)
	{
		$this -> setDb($db);
	}
	
	public function setDb(PDO $db)
	{
		$this -> _db = $db;
	}
	
	/* Les fonctionnalités */
	/* 	Ajouter un utilisateur */
	public function AddUser(Utilisateur $user)
	{
		$query = $this -> _db -> prepare('INSERT INTO utilisateur SET nom = :nom, prenom = :prenom, login = :login, 					  		password = :password, email = :email, settings = :settings');
        $crypted = md5($user -> getPassword());
		$query -> bindValue(':nom',$user -> getNom());
		$query -> bindValue(':prenom',$user -> getPrenom());
		$query -> bindValue(':login',$user -> getLogin());
		$query -> bindValue(':password',$crypted);
		$query -> bindValue(':email',$user -> getEmail());
		$query -> bindValue(':settings',$user -> getSettings());
		$query -> execute();
	}
	
	/* 	Supprimer un utilisateur */	
	public function DeleteUser($user)
	{
		$this -> _db -> exec('DELETE FROM utilisateur WHERE iduser = '.$user);
	}
	
	/* Mettre à jour un utilisateur */
	public function UpdateUser(Utilisateur $user)
	{
		$query = $this->_db->prepare('UPDATE Utilisateur SET nom = :nom, prenom = :prenom, login = :login, password = :password,    	email = :email, settings = :settings WHERE iduser = :iduser'); 
		$query -> bindValue(':iduser',$user -> getIdUser(), PDO::PARAM_INT);
		$query -> bindValue(':nom',$user -> getNom());
		$query -> bindValue(':prenom',$user -> getPrenom());
		$query -> bindValue(':login',$user -> getLogin());
		$query -> bindValue(':password',$user -> getPassword());
		$query -> bindValue(':email',$user -> getEmail());
		$query -> bindValue(':settings',$user -> getSettings());
	    $query->execute();
	}
	
	/* Récuperer un utilisateur particulier */
	public function getUser($iduser)
	{
	$iduser = (int) $iduser;
    $query = $this->_db->query('SELECT iduser, nom, prenom, login, password, email, settings FROM utilisateur WHERE iduser = '.$iduser);
    $donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$user = new Utilisateur($tst);
		$user -> setIdUser($donnees['iduser']);
		$user -> setNom($donnees['nom']);
		$user -> setPrenom($donnees['prenom']);
		$user -> setLogin($donnees['login']);
		$user -> setPassword($donnees['password']);
		$user -> setEmail($donnees['email']);
		$user -> setSettings($donnees['settings']);		
		return $user;
	}
	
	public function getUserNom($nom)
	{
		$query = $this->_db->query("SELECT iduser, nom, prenom, login, password, email, settings FROM utilisateur WHERE nom = '".$nom."'");
		$donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$user = new Utilisateur($tst);
		$user -> setIdUser($donnees['iduser']);
		$user -> setNom($donnees['nom']);
		$user -> setPrenom($donnees['prenom']);
		$user -> setLogin($donnees['login']);
		$user -> setPassword($donnees['password']);
		$user -> setEmail($donnees['email']);
		$user -> setSettings($donnees['settings']);		
		return $user;
	}
	
	/* Récuperer la liste de toute les utilisateurs */
	public function getAllUsers()
	{
	    $users = array(); 
    $query = $this->_db->query('SELECT iduser, nom, prenom, login, password, email, settings FROM utilisateur'); 
    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new Utilisateur($donnees);
    } 
    return $users;
	}
}
?>