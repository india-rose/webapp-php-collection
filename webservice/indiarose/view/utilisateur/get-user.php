<html>
<head>
    <title>Page Principale</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
</head>
<body>
<center>
    <h1><u>Gestion des utilisateurs</u></h1>
    <form name="frm" method="post" action="controler-methods.php">
        <table>
            <tr>
                <td><label id="nom">Liste des utilisateurs </label></td>
                <td>
                    <select name="categ">
                        <?php
                        foreach($listusers as $key)
                        {
                            echo '<option value='.$key -> getNom().'>'.$key -> getNom().'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="gt" value="get User" /></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>