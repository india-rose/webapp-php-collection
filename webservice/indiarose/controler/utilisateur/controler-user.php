<?php
require '../../model/utilisateur/Utilisateur.class.php';
require '../../model/utilisateur/UtilisateurManager.class.php';
require '../../model/Connection.class.php';

if(isset($_POST['cr']))
{
	// echo 'Create User !!';
	include_once "../../view/utilisateur/create-user.php";
}
if(isset($_POST['del']))
{
    $db = Connection::getConnection();
    $manager = new UtilisateurManager($db);
    $listusers = $manager -> getAllUsers();
	include_once "../../view/utilisateur/delete-user.php";
}
if(isset($_POST['gt']))
{
    $db = Connection::getConnection();
    $manager = new UtilisateurManager($db);
    $listusers = $manager -> getAllUsers();
	include_once "../../view/utilisateur/get-user.php";
}
?>