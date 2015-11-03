<?php
class IndiaGram
{
	/* Les attributs */
	private $_idind;
	private $_texte;
	private $_image;
	private $_son;
	private $_idcat;
	
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
	
	///////////////// Méthode pour afficher les informations d'un indiagram /////////////////
	 public function AfficherIndiaGram()
	 {
		return 'Id: '.$this -> getIdInd().' | Texte: '.$this -> getTexte().' | Image: '.$this -> getImage().' | Son: '.$this -> getSon().' | IdCat: '.$this -> getIdCat().'<br />';
	 }
	 
	/* Getters */	
	public function getIdInd() { return $this -> _idind; }
	public function getTexte() { return $this -> _texte; }
	public function getImage() { return $this -> _image; }
	public function getSon() { return $this -> _son; }
	public function getIdCat() { return $this -> _idcat; }
	
	/* Setters */
	public function setIdInd($idind)
	{
		$idind = (int)$idind;
		$this -> _idind = $idind; 
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
	
	public function setIdCat($idcat)
	{
		$idcat = (int)$idcat;
		$this -> _idcat = $idcat; 
	}
}
?>