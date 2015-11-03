<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
</html>
<?php
require 'Categorie.class.php';
require 'CategorieManager.class.php';
require '../Connection.class.php';

/////////////////////////////////////////////////////////
// inserer un IndiaGram
$db = Connection::getConnection();
$manager = new CategorieManager($db);
// pour inserer une catégorie, il faut que nous doivent d'abord avoir une catégorie
// $cat = $manager -> getCategorie(4);
$donnees = array('texte' => 'Feuille','image' => 'aa','son' => 'music.wav','idf' => 4);
$categorie = new Categorie($donnees);

// $manager -> AddCategorie($categorie);

echo '<br /><br />';

// Récupérer une seule enregistrement
/*
$categorie = $manager -> getCategorie(2);
$res = $categorie -> AfficherCategorie();
echo $res;
echo '<br /><br />';
*/

// $manager -> DeleteCategorie(30);

// Mettre à jour une catégorie
/*
$cat2 = $manager -> getCategorie(31);
$cat2 -> setTexte('NewCat');
$cat2 -> setImage('NewCat.wwav');
$manager -> UpdateCategorie($cat2); 
*/

echo '<br /><br />';

echo 'liste des catégories !!';

echo '<br />';
// Récuperer plusieurs enregistrement
$listcateg = $manager -> getAllCategories();
foreach($listcateg as $key)
{
		echo $key -> AfficherCategorie();
}
?>