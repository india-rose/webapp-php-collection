<?php
class Categorie
{
	/* Les attributs */
	private $_idcat;
	private $_texte;
	private $_image;
	private $_son;
	private $_idf;

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
	
	 ///////////////// Méthode pour afficher les informations d'une categorie /////////////////
	 public function AfficherCategorie()
	 {
		return 'Id: '.$this -> getIdCat().' | Texte: '.$this -> getTexte().' | Image: '.$this -> getImage().' | Son: '.$this -> getSon().' | IDF: '.$this -> getIdf().'<br />';
	 }
	 
	/* Getters */
	public function getIdCat() { return $this -> _idcat; }
	public function getTexte() { return $this -> _texte; }
	public function getImage() { return $this -> _image; }
	public function getSon() { return $this -> _son; }
	public function getIdf() { return $this -> _idf; }	
	
	/* Setters */
	public function setIdCat($idcat)
	{
		$idcat = (int)$idcat;
		$this -> _idcat = $idcat; 
	}
	
	public function setTexte ($texte)
	{		
		if(is_string($texte))  /* On vérifie qu il s agit bien d une chaîne de caractères. */
		{ 
			$this -> _texte = $texte; 
		}
	}
	
	public function setImage($image)
	{
		if(is_string($image)) 
		{ 
			$this -> _image = $image; 
		}
	}
	
	public function setSon($son)
	{
		if(is_string($son)) 
		{ 
			$this -> _son = $son; 
		}
	}
	
		public function setIdf($idf)
	{
		$idf = (int)$idf;
		$this -> _idf = $idf; 
	}
}
?>