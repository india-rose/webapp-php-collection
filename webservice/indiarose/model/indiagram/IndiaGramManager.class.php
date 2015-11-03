<?php
class IndiaGramManager
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
	/* 	Ajouter un IndiaGram */
	public function AddIndiaGram(IndiaGram $ing)
	{
		$query = $this -> _db -> prepare('INSERT INTO indiagram SET texte = :texte, image = :image, son = :son, 					  		idcat = :idcat');
        $texte = $ing -> getTexte();
        $texte = str_replace(" ", "_", $texte);
		$query -> bindValue(':texte',$texte);
		$query -> bindValue(':image',$ing -> getImage());
		$query -> bindValue(':son',$ing -> getSon());
		$query -> bindValue(':idcat',$ing -> getIdCat(), PDO::PARAM_INT);
		$query -> execute();
	}
	
	/* 	Supprimer un IndiaGram */	
	public function DeleteIndiaGram($ing)
	{
		$this -> _db -> exec('DELETE FROM indiagram WHERE idind = '.$ing);
	}
	
	/* Mettre à jour un IndiaGram */
	public function UpdateIndiaGram(IndiaGram $ing)
	{
		$query = $this->_db->prepare('UPDATE indiagram SET texte = :texte, image = :image, son = :son, idcat = :idcat WHERE idind = :idind'); 
		$query -> bindValue(':idind',$ing -> getIdInd(), PDO::PARAM_INT);		
		$query -> bindValue(':texte',$ing -> getTexte());
		$query -> bindValue(':image',$ing -> getImage());
		$query -> bindValue(':son',$ing -> getSon());
		$query -> bindValue(':idcat',$ing -> getIdCat(), PDO::PARAM_INT);
	    $query->execute();
	}
	
	/* Récuperer un IndiaGram particulier par son identifiant */
	public function getIndiaGram($idind)
	{
	$idind = (int) $idind;
    $query = $this->_db->query('SELECT idind, texte, image, son, idcat FROM indiagram WHERE idind = '.$idind);
    $donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$indiagram = new IndiaGram($tst);
		$indiagram -> setIdInd($donnees['idind']);
		$indiagram -> setTexte($donnees['texte']);
		$indiagram -> setImage($donnees['image']);
		$indiagram -> setSon($donnees['son']);
		$indiagram -> setIdCat($donnees['idcat']);
		return $indiagram;
	}
	
	/* Récuperer un IndiaGram particulier par son nom */
	public function getIndiaGramNom($texte)
	{
		$query = $this->_db->query("SELECT idind, texte, image, son, idcat FROM indiagram WHERE texte = '".$texte."'");
		$donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$indiagram = new IndiaGram($tst);
		$indiagram -> setIdInd($donnees['idind']);
		$indiagram -> setTexte($donnees['texte']);
		$indiagram -> setImage($donnees['image']);
		$indiagram -> setSon($donnees['son']);
		$indiagram -> setIdCat($donnees['idcat']);
		return $indiagram;
	}
	
	/* Récuperer la liste de toute les IndiaGrams */
	public function getAllGrams()
	{
	    $indiaGrams = array(); 
    $query = $this->_db->query('SELECT idind, texte, image, son, idcat FROM indiagram'); 
    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $indiaGrams[] = new IndiaGram($donnees);
    } 
    return $indiaGrams;
	}
}
?>