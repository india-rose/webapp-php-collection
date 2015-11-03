<?php
class CategorieManager
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
	
	/* Les fonctionnalit�s */
	/* 	Ajouter une categorie */
	public function AddCategorie(Categorie $cat)
	{
		$query = $this -> _db -> prepare('INSERT INTO categorie SET texte = :texte, image = :image, son = :son, idf = :idf');
        $texte = $cat -> getTexte();
        $texte = str_replace(" ", "_", $texte);
		$query -> bindValue(':texte',$texte);
		$query -> bindValue(':image',$cat -> getImage());
		$query -> bindValue(':son',$cat -> getSon());
		$query -> bindValue(':idf',$cat -> getIdf(), PDO::PARAM_INT);
		$query -> execute();
	}
	
	/* 	Supprimer une categorie */	
	public function DeleteCategorie($cat)
	{
		$this -> _db -> exec('DELETE FROM categorie WHERE idcat = '.$cat);
	}
	
	/* Mettre � jour une categorie */
	public function UpdateCategorie(Categorie $cat)
	{
		$query = $this->_db->prepare('UPDATE categorie SET texte = :texte, image = :image, son = :son, idf = :idsocateg WHERE idcat = :idcat'); 
		$query -> bindValue(':idcat',$cat -> getIdCat(), PDO::PARAM_INT);
		$query -> bindValue(':texte',$cat -> getTexte());
		$query -> bindValue(':image',$cat -> getImage());
		$query -> bindValue(':son',$cat -> getSon());
		$query -> bindValue(':idsocateg',$cat -> getIdf(), PDO::PARAM_INT);
	    $query->execute();
	}
	
	/* R�cuperer une categorie particulier */
	public function getCategorie($idcat)
	{
		$idcat = (int) $idcat;
		$query = $this->_db->query('SELECT idcat, texte, image, son, idf FROM categorie WHERE idcat = '.$idcat);
		$donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$categorie = new Categorie($tst);
		$categorie -> setIdCat($donnees['idcat']);
		$categorie -> setTexte($donnees['texte']);
		$categorie -> setImage($donnees['image']);
		$categorie -> setSon($donnees['son']);
		$categorie -> setIdf($donnees['idf']);
		return $categorie;
	}
	
	public function getCategorieNom($texte)
	{
		$query = $this->_db->query("SELECT idcat, texte, image, son, idf FROM categorie WHERE texte = '".$texte."'");
		$donnees = $query->fetch(PDO::FETCH_ASSOC); 	
		$tst = array();
		$categorie = new Categorie($tst);
		$categorie -> setIdCat($donnees['idcat']);
		$categorie -> setTexte($donnees['texte']);
		$categorie -> setImage($donnees['image']);
		$categorie -> setSon($donnees['son']);
		$categorie -> setIdf($donnees['idf']);
		return $categorie;
	}
	
	/* R�cuperer la liste de toute les cat�gories */
	public function getAllCategories()
	{
		$categories = array(); 
		$query = $this->_db->query('SELECT idcat, texte, image, son, idf FROM categorie'); 
		while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
		{
			$categories[] = new Categorie($donnees);
		} 
			return $categories;
	}

    /* Récuperer la liste des catégories sans la catégorie home */
    public function getAllCategoriesWithoutHome()
    {
        $categories = array();
        $query = $this->_db->query("SELECT idcat, texte, image, son, idf FROM categorie where texte != 'home'");
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $categories[] = new Categorie($donnees);
        }
        return $categories;
    }
}
?>