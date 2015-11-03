<?php
	require '../../model/Connection.class.php';
	require '../../model/indiagram/IndiaGram.class.php';
	require '../../model/indiagram/IndiaGramManager.class.php';
	require '../../model/categorie/Categorie.class.php';
	require '../../model/categorie/CategorieManager.class.php';
    require '../methods/Json.class.php';
    require '../methods/File.class.php';
    require '../methods/methods.php';
    require '../methods/XML.class.php';
	
	if(isset($_POST['sbm']))
	{
	$db = Connection::getConnection();
	$managerind = new IndiaGramManager($db);
	$managercat = new CategorieManager($db);
	
	 $texte = $_POST['txt'];
	 $categ = $_POST['categ'];
	 $img = $_FILES["img"]["name"];
	 $tempimg = $_FILES["img"]["tmp_name"];
	 $son = $_FILES["son"]["name"];	 	 
	 $tempson = $_FILES["son"]["tmp_name"];
	 
	 $categorie = $managercat -> getCategorieNom($categ);	 
	 
	if($categ == 'home')
	{
        $cheminImgFile = '../../layout/images/home/'.$img;
        $cheminSonFile = '../../layout/sons/home/'.$son;
	}
	else
	{
        $cheminImgFile = mkmap('../../layout/images/home',$categ).'/'.$img;
        $cheminSonFile = mkmap('../../layout/sons/home',$categ).'/'.$son;
	}

    move_uploaded_file($tempimg, $cheminImgFile);
    move_uploaded_file($tempson, $cheminSonFile);

    $donnees = array('texte' => $texte,'image' => $cheminImgFile, 'son' => $cheminSonFile, 'idcat' => $categorie -> getIdCat());

	$indiagram = new IndiaGram($donnees);
	$managerind -> AddIndiaGram($indiagram);
	$indiagram = $managerind -> getIndiaGramNom(str_replace(" ", "_", $texte));
	
	// Json::deliver_response_indiagram($indiagram -> getIdInd(), str_replace(" ", "_", $texte), $img, $son, $categ);
     Json::deliver_response_indiagram($indiagram);

    echo '<br />';
    echo "<a href='../controler.php?pr=1'>Retour au menu</a>";
	}
	
	if(isset($_POST['btn']))
	{
		$db = Connection::getConnection();
		$managerind = new IndiaGramManager($db);
		$texte = $_POST['gram'];
		$indiagram = $managerind -> getIndiaGramNom($texte);
		
		// Json::deliver_response_indiagram_id($indiagram -> getIdInd());
        Json::deliver_response_indiagram($indiagram);

        echo '<br />';
        echo "<a href='../controler.php?pr=1'>Retour au menu</a>";
	}
	
	if(isset($_POST['del']))
	{
		$db = Connection::getConnection();
		
		$manager = new CategorieManager($db);
		$managerind = new IndiaGramManager($db);
		
		$texte = $_POST['gram'];
		$indiagram = $managerind -> getIndiaGramNom($texte);
		$idind = $indiagram -> getIdInd();
		
		File::deleteFile($indiagram -> getImage());
		File::deleteFile($indiagram -> getSon());
		
		$managerind -> DeleteIndiaGram($idind);

		Json::deliver_response_indiagram_id($idind);

        echo '<br />';
        echo "<a href='../controler.php?pr=1'>Retour au menu</a>";
		
	}
?>