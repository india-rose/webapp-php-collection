<?php
	require '../../model/Connection.class.php';
	require '../../model/categorie/Categorie.class.php';
	require '../../model/categorie/CategorieManager.class.php';
	require '../methods/Json.class.php';
	require '../methods/File.class.php';
    require '../methods/methods.php';
    require '../methods/XML.class.php';
	
	if(isset($_POST['sbm']))
	{
	    $db = Connection::getConnection();
	    $manager = new CategorieManager($db);
	
	    $texte = $_POST['txt'];
	    $categ = $_POST['categ'];
	    $img = $_FILES["img"]["name"];
        $tempimg = $_FILES["img"]["tmp_name"];
	    $son = $_FILES["son"]["name"];
        $tempson = $_FILES["son"]["tmp_name"];

        $cheminImgDir = '';
        $cheminSonDir = '';
        $cheminImgFile = '';
        $cheminSonFile = '';

	    if($categ == 'home')
    	{
            $cheminImgDir = '../../layout/images/home/'.str_replace(" ", "_", $texte);
            $cheminSonDir = '../../layout/sons/home/'.str_replace(" ", "_", $texte);
            $cheminImgFile = '../../layout/images/home/'.$img;
            $cheminSonFile = '../../layout/sons/home/'.$son;
	    }

	    else
	    {
            $cheminImgDir = mkmap('../../layout/images/home',$categ).'/'.str_replace(" ", "_", $texte);
            $cheminSonDir = mkmap('../../layout/sons/home',$categ).'/'.str_replace(" ", "_", $texte);
            $cheminImgFile = mkmap('../../layout/images/home',$categ).'/'.$img;
            $cheminSonFile = mkmap('../../layout/sons/home',$categ).'/'.$son;
    	}


    /* Création des dossiers correspondants au catégorie */
         mkdir($cheminImgDir);
         mkdir($cheminSonDir);
    /* Création des fichiers correspondants à chaque catégorie */
        move_uploaded_file($tempimg, $cheminImgFile);
        move_uploaded_file($tempson, $cheminSonFile);

        $cat = $manager -> getCategorieNom($categ);

        $donnees = array('texte' =>$texte,'image' => $cheminImgFile, 'son' => $cheminSonFile, 'idf' => $cat -> getIdCat());
        $categorie = new Categorie($donnees);
        $manager -> AddCategorie($categorie);

        $c = $manager -> getCategorieNom(str_replace(" ", "_", $texte));
        Json::deliver_response_categorie_id($c -> getIdCat());

        // pour retourner à la page précédente après un certain nombre de secondes
        //header ("Refresh: 5;URL=../../view/categorie/create-categorie.php");

        echo '<br />';
        echo "<a href='../controler.php?param=1'>Retour au menu</a>";
}


	if(isset($_POST['btn']))
	{
        $db = Connection::getConnection();
        $manager = new CategorieManager($db);
		$texte = $_POST['categ'];
        $categorie = $manager -> getCategorieNom($texte);

		Json::deliver_response_categorie($categorie);
        // XML::XMLDisplay($categorie);

        // pour retourner à la page précédente après un certain nombre de secondes
        //header ("Refresh: 5;URL=../../view/categorie/get-categorie.php");

        echo '<br />';
        echo "<a href='../controler.php?param=1'>Retour au menu</a>";
	}

	if(isset($_POST['del']))
	{
		$db = Connection::getConnection();
		$manager = new CategorieManager($db);

		$categ = $_POST['categ'];

        $cheminImgDir = mkmap('../../layout/images/home',$categ);
        $cheminSonDir = mkmap('../../layout/sons/home',$categ);

        $categorie = $manager -> getCategorieNom($categ);

        rrmdir($cheminImgDir);
        rrmdir($cheminSonDir);
        // pour supprimer les fichiers
        File::deleteFile($categorie -> getImage());
        File::deleteFile($categorie -> getSon());

        $manager -> DeleteCategorie($categorie -> getIdCat());

        Json::deliver_response_categorie($categorie);
        // XML::XMLDisplay($categorie);

        // pour retourner à la page précédente après un certain nombre de secondes
        // header ("Refresh: 5;URL=../../view/categorie/delete-categorie.php");

        echo '<br />';
        echo "<a href='../controler.php?param=1'>Retour au menu</a>";
	}
?>