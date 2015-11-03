<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<?php
if(isset($_POST['btnu']) || isset($_GET['p']))
{
	include_once "../view/utilisateur/gestion-utilisateur.html";
}
if(isset($_POST['btni']) || isset($_GET['pr']))
{
	// echo 'Tu es dans la page gestion des indiagrams !!';
	include_once "../view/indiagram/gestion-indiagram.html";
}
if(isset($_POST['btnc']) || isset($_GET['param']))
{
	// echo 'Tu es dans la page gestion des catégorie !!';
    include_once "../view/categorie/gestion-categorie.html";
}
?>