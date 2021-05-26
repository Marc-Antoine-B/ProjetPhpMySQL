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
;}

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
        <form method="GET" action="InsertionVol.php">
            <h4>CRÉER UN NOUVEAU VOL</h4>

            <label for="noVol">Numéro du vol:</label>
            <input type="text" id="noVol" name="noVol">

            <label for="hDepart">Heure départ:</label>
            <input type="text" id="hDepart" name="hDepart">

            <label for="hArrive">Heure d'arrivée:</label>
            <input type="text" id="hArrive" name="hArrive">

            <label for="distanceKm">Distance en KM:</label>
            <input type="text" id="distanceKm" name="distanceKm">

            <label for="hTotal">Durée total du vol:</label>
            <input type="text" id="hTotal" name="hTotal">

            <label for="typeAppa">Type d'appareil:</label>
            <input type="text" id="TypeAppa" name="typeAppa">

            <label for="codeCie">Code de la compagnie:</label>
            <input type="text" id="codeCie" name="codeCie">

            <input id="btnConnec" class="bouton" value="Envoyer"  type="submit">
        </form>
        <?php
        try{
            $sql = "INSERT INTO tblUsagers
           VALUES ('".$_GET["noVol"]."','".$_GET["hDepart"]."','".$_GET["hArrive"]."','".$_GET["distanceKm"]."','".$_GET["hTotal"]."','".$_GET["typeAppa"]."','".$_GET["codeCie"]."')";

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
