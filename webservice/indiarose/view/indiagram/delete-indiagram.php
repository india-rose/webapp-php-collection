<html>
<head>
    <title>Page Principale</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
</head>
<body>
<center>
<h1><u>Gestion des Indiagrams</u></h1>
<form name="frm" method="post" action="controler-methods.php">
<table>
	<tr>
		<td><label id="Indiagram">Choisir un indiagram</label></td>
		<td>
			<select name="gram">
				<?php
					foreach($listgrams as $key)
					{	
						echo '<option value='.$key -> getTexte().'>'.$key -> getTexte().'</option>';
					}
				?>
			</select>
		</td>	
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="del" value="supprimer indiagram" /></td>
	</tr>
</table>	
</form>
</center>
</body>
</html>