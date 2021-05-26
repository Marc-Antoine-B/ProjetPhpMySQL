<?php
$servername = "cegepjon_1933191";
$username = "DICJ1933191";
$password = "cegepjon_1933191";
try
{
    $con = new PDO("mysql:host=$servername;dbdname=aeroport",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlNoBillet='SELECT noBillet FROM tblBillet dateVol > CURDATE';
    $noBillet = $conn->query($sqlNoBillet);
    $sqlInfoClient = 'SELECT noClient,nomClient,prenomClient FROM tblClient';
    $infoClient = $conn->query($sqlInfoClient);
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
<form method="POST" action ="Accueil.php">
    <table>
        <tr>
            <th>Numéro du billet</th>
            <td>
                <select id="noBillet" name="noBillet">
                    <?php
                    while ($donnesBillet = $noBillet->fetch())
                    {
                    echo '<option value=' . $donnesBillet['noBillet'] . '>'.$donnesBillet['noBillet'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <th>Numéro du client</th>
        <td>
            <select id="noClient" name="noClient">
                <?php
                while ($donnesClient = $infoClient->fetch())
                {
                    echo '<option value=' . $donnesClient['noClient'] . '>'.$donnesClient['noClient'].'</option>';
                }
                ?>
            </select>
        </td>
        </tr>
        <tr>
            <th>Prénom du client</th>
            <td>
                <select id="prenomClient" name="prenomClient">
                    <?php
                    while ($donnesClient = $infoClient->fetch())
                    {
                        echo '<option value=' . $donnesClient['prenomClient'] . '>'.$donnesClient['prenomClient'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Nom du client</th>
            <td>
                <select id="nomClient" name="nomClient">
                    <?php
                    while ($donnesClient = $infoClient->fetch())
                    {
                        echo '<option value=' . $donnesClient['nomClient'] . '>'.$donnesClient['nomClient'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
    </table>



</form>
    </div>
</div>


<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>

