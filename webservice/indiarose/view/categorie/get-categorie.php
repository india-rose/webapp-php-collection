<html>
<head>
    <title>Page Principale</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
</head>
<body>
<center>
<h1><u>Gestion des catégories</u></h1>
<form name="frm" method="post" action="controler-methods.php">
<table>
	<tr>
		<td><label id="lblcat">Categorie </label></td>
		<td>
			<select name="categ">
				<?php
                    if(isset($listcategs))
                    {
					    foreach($listcategs as $key)
					    {
						    echo '<option value='.$key -> getTexte().'>'.$key -> getTexte().'</option>';
					    }
                    }
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="btn" value="Get" /></td>
	</tr>
</table>	
</form>
</center>
</body>
</html>