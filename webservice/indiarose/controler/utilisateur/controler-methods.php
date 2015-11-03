<?php	
	require '../../model/Connection.class.php';
	require '../../model/utilisateur/Utilisateur.class.php';
	require '../../model/utilisateur/UtilisateurManager.class.php';
	require '../methods/Json.class.php';
    require '../methods/XML.class.php';
	
	$db = Connection::getConnection();
	$manager = new UtilisateurManager($db);
	
if(isset($_POST['gt']))
{
    $nom = $_POST['categ'];
	$user = $manager -> getUserNom($nom);
    Json::deliver_response_utilisateur($user);

    echo '<br />';
    echo "<a href='../controler.php?p=1'>Retour au menu</a>";
}

if(isset($_POST['del']))
{
    $nom = $_POST['categ'];
	$user = $manager -> getUserNom($nom);
	$id = $user -> getIdUser();
	$manager -> DeleteUser($user -> getIdUser());
    Json::deliver_response_utilisateur($user);

    echo '<br />';
    echo "<a href='../controler.php?p=1'>Retour au menu</a>";
}

if(isset($_POST['cr']))
{
    $nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$password = $_POST['pass'];
	$email = $_POST['email'];
    // $settings = utf8_decode($_POST['gd']).','.utf8_decode($_POST['lc']).','.$_POST['temps'];
    $settings = $_POST['gd'].','.$_POST['lc'].','.$_POST['temps'];
	$donnees = array('nom' => $nom,'prenom' => $prenom, 'login' => $login, 'password' => $password, 'email' => $email, 'settings' => $settings);
	$user = new Utilisateur($donnees);
	$manager -> AddUser($user);
    $user = $manager -> getUserNom($nom);
	Json::deliver_response_utilisateur($user);

    echo '<br />';
    echo "<a href='../controler.php?p=1'>Retour au menu</a>";
}
?>