<?php
    require '../../model/Connection.class.php';
    require '../../model/categorie/Categorie.class.php';
    require '../../model/categorie/CategorieManager.class.php';

if(isset($_POST['cr']))
{
    $db = Connection::getConnection();
    $manager = new CategorieManager($db);
    $listcategs = $manager -> getAllCategories();
    include_once "../../view/categorie/create-categorie.php";
}
if(isset($_POST['del']))
{
    $db = Connection::getConnection();
    $manager = new CategorieManager($db);
    $listcategs = $manager -> getAllCategoriesWithoutHome();
    include_once "../../view/categorie/delete-categorie.php";
}
if(isset($_POST['gt']))
{
    $db = Connection::getConnection();
    $manager = new CategorieManager($db);
    $listcategs = $manager -> getAllCategories();
    include_once "../../view/categorie/get-categorie.php";
}
?>