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
                <td><label id="nom">Nom</label></td>
                <td><input type="text" name="nom" /></td>
            </tr>
            <tr>
                <td><label id="prenom">Prénom</label></td>
                <td><input type="text" name="prenom" /></td>
            </tr>
            <tr>
                <td><label id="login">Login</label></td>
                <td><input type="text" name="login" /></td>
            </tr>
            <tr>
                <td><label id="pass">Password</label></td>
                <td><input type="password" name="pass" /></td>
            </tr>
            <tr>
                <td><label id="mail">Email</label></td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td></td>
                <td><u><label id="settings">Settings</label></u></td>
            </tr>
            <tr>
                <td><label id="Glisser-Déposer">Glisser-Déposer</label></td>
                <td>
                    <INPUT type= "radio" name="gd" value="active" checked>Activé
                    <INPUT type= "radio" name="gd" value="desactive">Désactivé
                </td>
            </tr>
            <tr>
                <td><label id="Lecture Catégorie">Lecture Catégorie</label></td>
                <td>
                    <INPUT type= "radio" name="lc" value="active" checked>Activé
                    <INPUT type= "radio" name="lc" value="desactive">Désactivé
                </td>
            </tr>
            <tr>
                <td><label id="Délai">Délai lecture entre deux mot (en S)</label></td>
                <td>
                    <select name="temps">
                    <?php
                        for($i=0; $i<=60; $i++)
                        {
                            echo '<option value='.$i.'>'.$i.'</option>';
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="cr" value="Create User" /></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>