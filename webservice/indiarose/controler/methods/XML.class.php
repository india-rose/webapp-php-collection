
<?php
class XML
{
    public static function XMLDisplay($object)
    {
        $xml = new DomDocument("1.0","UTF-8");
        $container = $xml -> createElement('IndiaRose');
        $container = $xml -> appendChild($container);

        if (is_a($object, 'Categorie'))
        {
            $categorie = $xml -> createElement('Catégorie');
            $categorie = $container -> appendChild($categorie);

            $idcat = $xml -> createElement("identifiant",$object -> getIdCat());
            $idcat = $categorie -> appendChild($idcat);

            $txt = $xml -> createElement("texte",$object -> getTexte());
            $txt = $categorie -> appendChild($txt);

            $img = $xml -> createElement("image",$object -> getImage());
            $img = $categorie -> appendChild($img);

            $sn = $xml -> createElement("son",$object -> getSon());
            $sn = $categorie -> appendChild($sn);

            $idf = $xml -> createElement("sous_identifiant",$object -> getIdf());
            $idf = $categorie -> appendChild($idf);
        }
        if (is_a($object, 'IndiaGram'))
        {
            $indiagram = $xml -> createElement('IndiaGram');
            $indiagram = $container -> appendChild($indiagram);

            $idind = $xml -> createElement("identifiant",$object -> getIdInd());
            $idind = $indiagram -> appendChild($idind);

            $txt = $xml -> createElement("texte",$object -> getTexte());
            $txt = $indiagram -> appendChild($txt);

            $img = $xml -> createElement("image",$object -> getImage());
            $img = $indiagram -> appendChild($img);

            $sn = $xml -> createElement("son",$object -> getSon());
            $sn = $indiagram -> appendChild($sn);

            $idcat = $xml -> createElement("sous_identifiant",$object -> getIdCat());
            $idcat = $indiagram -> appendChild($idcat);
        }

        if(is_a($object, 'Utilisateur'))
        {
            $user = $xml -> createElement('Utilisateur');
            $user = $container -> appendChild($user);

            $iduser = $xml -> createElement("identifiant",$object -> getIdUser());
            $iduser = $user -> appendChild($iduser);

            $nom = $xml -> createElement("nom",$object -> getNom());
            $nom = $user -> appendChild($nom);

            $prenom = $xml -> createElement("prenom",$object -> getPrenom());
            $prenom = $user -> appendChild($prenom);

            $login = $xml -> createElement("login",$object -> getLogin());
            $login = $user -> appendChild($login);

            $password = $xml -> createElement("password",$object -> getPassword());
            $password = $user -> appendChild($password);

            $email = $xml -> createElement("email",$object -> getEmail());
            $email = $user -> appendChild($email);

            $settings = $xml -> createElement("settings",$object -> getSettings());
            $settings = $user -> appendChild($settings);
        }

        $xml -> FormatOutput = true;
        $string_value = $xml -> saveXML();
        $xml -> save("../methods/result.xml");
    }
}
?>

<!-- Test de la methode -->
<?php
/*
require '../../model/utilisateur/Utilisateur.class.php';
require '../../model/utilisateur/UtilisateurManager.class.php';
require '../../model/categorie/Categorie.class.php';
require '../../model/categorie/CategorieManager.class.php';
require '../../model/indiagram/IndiaGram.class.php';
require '../../model/indiagram/IndiaGramManager.class.php';
$obj = new Categorie(array('idcat' => 1, 'texte' => 'a', 'image' => 'b', 'son' => 'c', 'idf' => null));
$obj2 = new IndiaGram(array('idind' => 11, 'texte' => 'aa', 'image' => 'bb', 'son' => 'cc', 'idcat' => null));
$obj3 = new Utilisateur(array('iduser' => 1, 'nom' => 'Gates', 'prenom' => 'Bill', 'login' => 'mayden', 'password' => 'aaa', 'email' => 'ss@gmail.com', 'settings' => 'a,b,c,d'));
XML::XMLDisplay($obj)
*/
?>