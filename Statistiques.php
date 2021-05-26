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

    <div id="corps">
        <?php
        $reponse1 = $conn->query('SELECT TV.noVol AS "Numero de vol",
            COUNT(noBillet) AS "Nombre de Billet"
            FROM tblbillet AS TB 
            JOIN tblVol AS TV
            ON TB.noVol = TV.noVol
            GROUP BY TV.noVol;');
        echo $reponse1;
        $reponse2 = $conn->query('SELECT TV.noVol AS "Numero de vol",
            COUNT(noBillet) AS "Nombre de Billet"
            FROM tblBillet AS TB 
            JOIN tblVol AS TV
            ON TB.noVol = TV.noVol
            GROUP BY TV.noVol;');
        echo $reponse2;
        $reponse3 = $conn->query('SELECT TA.areoportDepart AS "Aeroport de départ",
        COUNT(noBillet) AS "Nombre de Billet"
        FROM tblBillet AS TB
        JOIN tblAeroport AS TA
        ON TB.aeroportDepart = TA.areoportDepart
        GROUP BY TA.aeroportDepart;');
        echo $reponse3;
        $reponse4 = $conn->query('SELECT TA.nomAeroport AS "Nom des Aéroports"
        AVG(dureeTotalVol) AS "Duree total du vol"
         FROM tblVol AS TV
         RIGHT OUTER JOIN tblAeroport AS TA
         ON TV.nomAeroport = TA.nomAeroport
         GROUP BY TA.nomAeroport;');
        echo $reponse4;
        $reponse5 = $conn->query('SELECT TC.noClient a "No de Client",
        CONCAT(TC.prenomClient," ",TC.nomClient) AS "Nom du client",
        SUM(prixBillet) AS "Somme totale payée"
        FROM tblClient AS TC 
        JOIN tblReservation AS TR 
        ON TC.noClient = TR.noClient
        JOIN tblBillet AS TB 
        ON TB.noReservation = TR.noReservation
        GROUP BY TC.noClient');

        ?>
        <tr>
            <td>
                <select id="rep1" name="rep1">
                    <?php
                    while ($reponse1->fetch())
                    {
                        echo '<option value=' . $reponse1['TV.noVol'] . '>'.$reponse1['TV.noVol'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr><tr>
            <td>
                <select id="rep2" name="rep2">
                    <?php
                    while ($reponse2->fetch())
                    {
                        echo '<option value=' . $reponse2['TV.noVol'] . '>'.$reponse2['TV.noVol'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr><tr>
            <td>
                <select id="rep3" name="rep3">
                    <?php
                    while ($reponse3->fetch())
                    {
                        echo '<option value=' . $reponse3['TA.aeroportDepart'] . '>'.$reponse3['TA.aeroportDepart'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr><tr>
            <td>
                <select id="rep4" name="rep4">
                    <?php
                    while ($reponse4->fetch())
                    {
                        echo '<option value=' . $reponse4['TA.nomAeroport'] . '>'.$reponse4['TA.nomAeroport'].'</option>';
                    }
                    ?>
                </select>
            </td>
        <tr>
            <td>
                <select id="rep5" name="rep5">
                    <?php
                    while ($reponse5->fetch())
                    {
                        echo '<option value=' . $reponse5['TC.noClient'] . '>'.$reponse5['TC.noClient'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
    </div>


<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
