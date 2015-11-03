<?php
require '../../model/categorie/Categorie.class.php';
require '../../model/categorie/CategorieManager.class.php';
require '../../model/indiagram/IndiaGram.class.php';
require '../../model/indiagram/IndiaGramManager.class.php';
require '../../model/Connection.class.php';

$db = Connection::getConnection();

if(isset($_POST['geti']))
{
	$manager = new IndiaGramManager($db);
	$listgrams = $manager -> getAllGrams();
	include_once "../../view/indiagram/get-indiagram.php";
}
if(isset($_POST['createi']))
{	
	$manager = new CategorieManager($db);
	$listcategs = $manager -> getAllCategoriesWithoutHome();
	include_once "../../view/indiagram/create-indiagram.php";
}
if(isset($_POST['deletei']))
{
	$manager = new IndiaGramManager($db);
	$listgrams = $manager -> getAllGrams();
	include_once "../../view/indiagram/delete-indiagram.php";
}
?>