<?php
$servername = "cegepjon_1933191";
$username = "DICJ1933191";
$password = "cegepjon_1933191";
try
{
    $con = new PDO("mysql:host=$servername;dbdname=aeroport",$username,$password);
    $con = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Connexion Réussi";
}
catch(PDOException $e)
{
    header("Location : Inscription.php");
}

?>
<!doctype html>
<html lang="eng">
<link rel="stylesheet" href="Lab02-2.css">
<body>

<div id="header">
    <?php
    include 'header.php';
    ?>
</div>
<div id="fusion">
    <div id="menu">
        <?php
        include 'menu.php';
        ?>
    </div>

    <div id="corps">
        <form method="GET" action="InsertionClient.php">
            <h4>CRÉER UN NOUVEAU CLIENT</h4>

            <label for="noClient">Numéro du client:</label>
            <input type="text" id="noClient" name="noClient">

            <label for="nomClient">Nom du client:</label>
            <input type="text" id="nomClient" name="nomClient">

            <label for="prenomClient">Prénom du client:</label>
            <input type="text" id="prenomClient" name="prenomClient">

            <label for="noTel">Numéro de téléphone:</label>
            <input type="text" id="noTel" name="noTel">

            <label for="adresseClient">Adresse du client:</label>
            <input type="text" id="adresseClient" name="adresseClient">

            <label for="escompte">Escompte client:</label>
            <input type="text" id="escompte" name="escompte">

            <input id="btnConnec" class="bouton" value="Envoyer"  type="submit">
        </form>
        <?php
        try{
            $sql = "INSERT INTO tblUsagers
           VALUES ('".$_GET["noClient"]."','".$_GET["NomClient"]."','".$_GET["prenomClient"]."','".$_GET["noTel"]."','".$_GET["adresseClient"]."','".$_GET["escompte"]."')";

            $con->exec($sql);
            echo "Insertion réussi !";
        }
        catch(PDOException $e)
        {
            echo "Erreur d'insertion.";
        }
        $conn = null;
        ?>

    </div>
</div>


<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
