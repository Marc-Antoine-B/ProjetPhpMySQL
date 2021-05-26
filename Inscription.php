<?php
$servername = "cegepjon_1933191";
$username = "DICJ1933191";
$password = "cegepjon_1933191";
try
{
    $con = new PDO("mysql:host=$servername;dbdname=aeroport",$username,$password);
    $con = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Inscription Réussi";
}
catch(PDOException $e)
{
    echo "Réessayer";
    header("Location : Inscription.php");
}

?>


    <form method="POST" action="Connection.php">
        <h4>Enregistez-vous !</h4>

        <label for="txtNom">Nom d'utilisateur:</label>
        <input type="text" id="txtNom" name="txtNom">

        <label for="txtNom">Mot de passe:</label>
        <input type="text" id="txtMdp" name="txtMdp">

        <label for="txtNom">Prénom:</label>
        <input type="text" id="txtPrenom" name="txtPrenom">

        <label for="txtNom">Nom de famille:</label>
        <input type="text" id="txtNomF" name="txtNomF">

        <input id="btnConnec" class="bouton" value="Connexion"  type="submit">
        <input id="btninscri" class="bouton" value="Inscription"  type="submit">
    </form>
<?php

try{
    $sql = "INSERT INTO tblUsagers
           VALUES ('".$_POST["txtNom"]."','".$_POST["txtMdp"]."','".$_POST["txtPrenom"]."','".$_POST["txtNomF"]."')";

    $con->exec($sql);
    echo "Bienvenue à ".$_POST["txtPrenom"]." ".$_POST["txtNomF"]."";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>
