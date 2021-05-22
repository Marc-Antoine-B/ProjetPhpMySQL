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
    die('Connexion échouée. Erreur :'.$e->getMessage());
}

$nom = $con->query('SELECT nomUsager FROM tblUsagers');
$password = $con->query('SELECT pwdUsager FROM tblUsagers');

if($nom==true && $password==true)
{
    $prenom = $con->query('SELECT prenomUtilisateur FROM tblUsagers');
    $nomUti = $con->query('SELECT nomUtilisateur FROM tblUsagers');
    echo "Bienvenue $prenom $nomUti.";
}
else
    header("location : register")

?>
<link rel="stylesheet" href="Lab02.css">
<div id="header">
    <?php
    include 'header.php';
    ?>
</div>
<div id="menu">
    <?php
    $numvol = $conn->query('SELECT * FROM tblVol');

    $hdepart = $conn->query('SELECT * FROM tblVol');

    $harrivee = $conn->query('SELECT * FROM tblVol');

    $duree = $conn->query('SELECT * FROM tblVol');


    echo '<table>';

    echo'<tr>';
    echo'<th>Numéro de vol</th>>';
    while ($donnes = $numvol->fetch())
    {
        echo '  <td>' . $donnes['noVol'] . ' </td> ';
    }
    echo'</tr>';
    echo'<tr>';
    echo'<th>Heure de départ</th>>';
    while ($donees = $hdepart->fetch())
    {
        echo '  <td>' .$donnes['heureDepart'] . ' </td>  ' ;
    }
    echo'</tr>';
    echo'<tr>';
    echo"<th>Heure d'arrivée</th>";
    while ($donnes = $harrivee->fetch())
    {
        echo '  <td>' .$donnes['heureArrivee'] . ' </td>  ';
    }
    echo'</tr>';
    echo'<tr>';
    echo'<th>Durée totale</th>>';
    while ($donnes = $duree->fetch())
    {
        echo '<td>' .$donnes['dureeTotalVol'] . ' </td>  ';
    }
    echo'<tr>';
    echo'</table>'
    ?>
</div>
</div>

<div id="corps">
    <form method="GET" action="VisualisationVol.php">
        <h4>Enregistrer votre vol</h4>

        <label for="appa">Type d'appareils:</label>
        <select id="appa" name="appa">
            <option value=""></option>
            <?php
            $reponse = $conn->query("SELECT * FROM tblTypeAppareil");

            while($donnees = $reponse->fetch())
            {
                echo "<option value='".$donnees["codeTypeAppareil"]."'>".$donnees["descTypeAppareil"]."</option>";
            }
            ?>
        </select>
        <label for="comp">Compagnies:</label>
        <select id="comp" name="comp">
            <option value=""></option>
            <?php
            $reponse = $conn->query("SELECT * FROM tblCompagnieAerienne");

            while($donnees = $reponse->fetch())
            {
                echo "<option value='".$donnees["codeCie"]."'>".$donnees["nomCie"]."</option>";
            }
            ?>
        </select>
        <label for="aeroa">Aéoport Arrivée:</label>
        <select id="aeroa" name="aeroa">
            <option value=""></option>
            <?php
            $reponse = $conn->query("SELECT * FROM tblAeroport");

            while($donnees = $reponse->fetch())
            {
                echo "<option value='".$donnees["codeAeroport"]."'>".$donnees["aeroportArrivee"]."</option>";
            }
            ?>
        </select>
        <label for="aerod">Aéroport Départ:</label>
        <select id="aerod" name="aerod">
            <option value=""></option>
            <?php
            $reponse = $conn->query("SELECT * FROM tblAeroport");

            while($donnees = $reponse->fetch())
            {
                echo "<option value='".$donnees["codeAeroport"]."'>".$donnees["aeroportDepart"]."</option>";
            }
            ?>
        </select>

        <input id="btnEnvoyer" class="bouton" value="Envoyer"  type="submit">
    </form>
</div>
</div>
<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>