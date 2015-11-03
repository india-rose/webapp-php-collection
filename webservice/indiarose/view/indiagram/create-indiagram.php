<html>
<head>
    <title>Page Principale</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
</head>
<body>
<center>
<h1><u>Gestion des Indiagrams</u></h1>
<form name="frm" method="post" action="controler-methods.php" enctype="multipart/form-data">
<table>
	<tr>
		<td><label id="lbltxt">Texte </label></td>
		<td><input type="texte" name="txt" /></td>
	</tr>
	<tr>
		<td><label id="lblimg">Image </label></td>
		<td><input type="file" name="img" /></td>
	</tr>
	<tr>
		<td><label id="lblson">Son </label></td>
		<td><input type="file" name="son" /></td>
	</tr>
	<tr>
		<td><label id="lblcat">Categorie </label></td>
		<td>
			<select name="categ">
				<?php
					foreach($listcategs as $key)
					{	
						echo '<option value='.$key -> getTexte().'>'.$key -> getTexte().'</option>';
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="sbm" value="Create" /></td>
	</tr>
</table>	
</form>
</center>
</body>
</html>