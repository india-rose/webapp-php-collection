<?php
class Json
{
	public static function deliver_response_categorie($categorie)
	{
		$response['identifiant categorie'] = $categorie -> getIdCat();
		$response['texte'] = $categorie -> getTexte();
		$response['image'] = $categorie -> getImage();
		$response['son'] = $categorie -> getSon();
		$response['identifiant sous categorie'] = $categorie -> getIdf();
		$json_response = json_encode($response);
		echo $json_response;
	}

    public static function deliver_response_categorie_id($idcat)
    {
        $response['identifiant categorie'] = $idcat;
        $json_response = json_encode($response);
        echo $json_response;
    }

    public static function deliver_response_indiagram($ind)
    {
        $response['id indiagram'] = $ind -> getIdInd();
        $response['texte'] = $ind -> getTexte();
        $response['image'] = $ind -> getImage();
        $response['son'] = $ind -> getSon();
        $response['categorie'] = $ind -> getIdCat();
        $json_response = json_encode($response);
        echo $json_response;
    }
	/*
	public static function deliver_response_indiagram($idind, $texte, $image, $son, $categ)
	{
		$response['id indiagram'] = $idind;
		$response['texte'] = $texte;
		$response['image'] = $image;
		$response['son'] = $son;
		$response['categorie'] = $categ;
		$json_response = json_encode($response);
		echo $json_response;
	}
	*/
	public static function deliver_response_indiagram_id($idind)
	{
		$response['id indiagram'] = $idind;
		$json_response = json_encode($response);
		echo $json_response;
	}
	
	public static function deliver_response_utilisateur($user)
	{
		$response['identifiant user'] = $user -> getIdUser();
		$response['nom'] = $user -> getNom();
		$response['prenom'] = $user -> getPrenom();
		$response['login'] = $user -> getLogin();
		$response['password'] = $user -> getPassword();
		$response['email'] = $user -> getEmail();
		$response['settings'] = $user -> getSettings();
		$json_response = json_encode($response);
		echo $json_response;
	}
}
?>