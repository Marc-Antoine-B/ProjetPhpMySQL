<?php
session_start();

$_SESSION['txtNom'];
$_SESSION['txtMdp'];
if($_SESSION['txtNom'] == null or $_SESSION['txtMdp']== null)
{
    echo header("Location: Connexion.php");;
}

$servername = "cegepjon_1933191";
$username = "DICJ1933191";
$password = "cegepjon_1933191";
try
{
    $con = new PDO("mysql:host=$servername;dbdname=aeroport",$username,$password);
    $con = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Connexion Réussi";
}
catch(PDOException $e) {
    die('Connexion échouée. Erreur :' . $e->getMessage());
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
    echo header("Location: register.php");


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
        <h1>Vous n'avez aucun voyage.</h1>

    </div>
</div>


<div id="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</body>
</html>
