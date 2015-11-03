<html>
<head>
<!-- Encodage UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
</html>
<?php
require 'Utilisateur.class.php';
require 'UtilisateurManager.class.php';
require '../Connection.class.php';

$donnees = array('nom' => 'Raki','prenom' => 'Ahmed','login' => 'dada','password' => 'abcdef','email' => 'dada@gmail.com','settings' => 'a,b,c,d');
$user = new Utilisateur($donnees);
$resultat = $user -> AfficherUtilisateur();
echo $resultat;
echo '<br /><br />';

/////////////////////////////////////////////////////////
// inserer un utilisateur
// $db = new PDO('mysql:host=localhost;dbname=indiarosedb', 'root', '');
$db = Connection::getConnection();
$manager = new UtilisateurManager($db);
// $manager -> AddUser($user);


// Récupérer une seule enregistrement
$user = $manager -> getUser(1);
$res = $user -> AfficherUtilisateur();
echo $res;
echo '<br /><br />';

// $manager -> DeleteUser(3);
$user2 = $manager -> getUser(2);
$user2 -> setNom('Barakat');
$user2 -> setPrenom('Rida');
$manager -> UpdateUser($user2); 
echo '<br />';



echo 'liste des utilisateurs !!';

echo '<br />';
// Récuperer plusieurs enregistrement
$listusers = $manager -> getAllUsers();
foreach($listusers as $key => $value)
{
	// echo $key.'<br />';
	$p = $manager -> getUser($key+1);
	echo $p -> AfficherUtilisateur();
}

?>