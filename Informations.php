<?php
$servername = "cegepjon_1933191";
$username = "DICJ1933191";
$password = "cegepjon_1933191";
try
{
    $con = new PDO("mysql:host=$servername;dbdname=aeroport",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
<table>
    <div id="corps">
        <?php
        $AeroportPays = $conn->query('SELECT TP.nomPays AS "Nom Pays",
            COUNT(aeroportDepart) AS "aeroports de départ"
            FROM tblAeroport AS TA
            JOIN tblPays AS TP
            ON TP.nomPays = TA.nomPays
            GROUP BY nomPays;');
            ?>
        <tr>
            <th>Nombre d'aéroports par pays</th>
            <td>
                <select id="AeroportPays" name="AeroportPays">
                    <?php
                    while ($AeroportPays->fetch())
                    {
                        echo '<option value=' . $AeroportPays['nomPays'] . '>'.$AeroportPays['nomPays'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $VilleAeroport = $conn->query('SELECT TV.nomVille AS "Nom de la ville",
            WHERE aeroportDepart IS NULL
            FROM tblAeroport AS TA
            JOIN tblVille AS TV
            ON TV.nomVille = TA.nomVille
            GROUP BY nomVille;');
        ?>
        <tr>
            <th>Ville où il n'y a pas d'aéroports</th>
            <td>
                <select id="VilleAeroport" name="VilleAeroport">
                    <?php
                    while ($VilleAeroport->fetch())
                    {
                        echo '<option value=' . $VilleAeroport['nomVille'] . '>'.$VilleAeroport['nomVille'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $MoyBillet = $conn->query('SELECT TB.dateVol AS "Date du vol"
            FROM tblBillet AS TB
            SELECT TV.noVol AS "numéro du vol"
            FROM tblVol AS TV
            SELECT TA.nomAeroport AS "Nom de aeroport"
            FROM tblAeroport AS TA
            SELECT TA.aeroportDepart AS "Aeroport départ"
            FROM tblAeroport AS TA
            SELECT TA.aeroportArrivee AS "Aeroport Arrivée",
            FROM tblAeroport AS TA
            WHERE prixBillet IS < AVG(prixBillet)
            JOIN TV.noVol = TA.noVol = TB.noVol
            FROM tblBillet AS TB
            GROUP BY dateVol;');
        ?>
        <tr>
            <th>le numéro du vol, le nom de l'aéroport de départ, le nom de
                l'aéroport d'arrivée et la date du vol pour les vols dont le prix du billet est
                inférieur à la moyenne des prix des billets</th>
            <td>
                <select id="MoyBillet" name="MoyBillet">
                    <?php
                    while ($MoyBillet->fetch())
                    {
                        echo '<option value=' . $MoyBillet['dateVol'] . '>'.$MoyBillet['dateVol'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $Dejeuner = $conn->query('SELECT TV.noVol AS "Numéro Vol"
            SELECT TC.nomClient AS "Nom du client"
            SELECT TC.prenomClient AS "Prenom du client",
            FROM tblBillet AS TB
            FROM tblClient AS TC
            WHERE typeRepas IS DÉJEUNER
            JOIN tblVol AS TV
            ON TV.noVol = TC.noVol
            GROUP BY noVol;');
        ?>
        <tr>
            <th>Le nom et le prénom des clients et le numéro du vol pour les billets
                dont le type de repas contient DÉJEUNER</th>
            <td>
                <select id="AeroportPays" name="AeroportPays">
                    <?php
                    while ($Dejeuner->fetch())
                    {
                        echo '<option value=' . $Dejeuner['noVol'] . '>'.$Dejeuner['noVol'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $AeroportPays = $conn->query('SELECT TP.nomPays AS "Nom Pays",
            COUNT(aeroportDepart) AS "aeroports de départ"
            FROM tblAeroport AS TA
            JOIN tblPays AS TP
            ON TP.nomPays = TA.nomPays
            GROUP BY nomPays;');
        ?>
        <tr>
            <th>Afficher le nombre de billets de chaque classe avec le nom de la classe.</th>
            <td>
                <select id="AeroportPays" name="AeroportPays">
                    <?php
                    while ($AeroportPays->fetch())
                    {
                        echo '<option value=' . $AeroportPays['nomPays'] . '>'.$AeroportPays['nomPays'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $ClientClasse = $conn->query('SELECT TC.noClient AS "Numéro Client",
            COUNT(nomClasse) AS "Nom de la classe"
            FROM tblClasseBillet AS TCB
            JOIN tblClient AS TC
            ON TC.noClient = TCB.noClient
            GROUP BY noClient;');
        ?>
        <tr>
            <th>Tous les clients qui ont acheté un billet en classe affaires.</th>
            <td>
                <select id="ClientClasse" name="ClientClasse">
                    <?php
                    while ($ClientClasse->fetch())
                    {
                        echo '<option value=' . $ClientClasse['noClient'] . '>'.$ClientClasse['noClient'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $VolCie = $conn->query('SELECT TV.codeCie AS "Code compagnie",
            COUNT(noVol) AS "Numéro de vol"
            FROM tblVol AS TV
            GROUP BY codeCie;');
        ?>
        <tr>
            <th>Le nombre de vols par compagnie aérienne.</th>
            <td>
                <select id="VolCie" name="VolCie">
                    <?php
                    while ($VolCie->fetch())
                    {
                        echo '<option value=' . $VolCie['codeCie'] . '>'.$VolCie['codeCie'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        $PassagerVille = $conn->query('SELECT TB.noBillet AS "Numéro Billet",
            COUNT(aeroportArrivee) AS "aeroports arriver"
            FROM tblAeroport AS TA
            JOIN tblBillet AS TB
            ON TB.noBillet = TA.noBillet
            GROUP BY noBillet
            SELECT noBillet,
            COUNT(nomVille) AS "Nom ville"
            FROM tblVille AS TV
            JOIN tblBillet AS TB
            ON TB.noBillet = TV.noBillet
            GROUP BY nomVille;');
        ?>
        <tr>
            <th>Le nombre de passagers atterrissant par ville</th>
            <td>
                <select id="PassagerVille" name="PassagerVille">
                    <?php
                    while ($PassagerVille->fetch())
                    {
                        echo '<option value=' . $PassagerVille['nomVille'] . '>'.$PassagerVille['nomVille'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        </table>
    </div>
</div>


<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
