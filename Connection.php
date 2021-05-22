<!doctype html>
<html lang="eng">
<link rel="stylesheet" href="Lab02.css">
<body>
<div id="header">
    <h1>Superman Airport</h1>
</div>

<div id="corps">

    <form method="POST" action="accueil.php">
        <h4>Connectez-vous pour enregistrer votre vol</h4>

        <label for="txtNom">Nom d'utilisateur:</label>
        <input type="text" id="txtNom" name="txtNom">

        <label for="txtMdp">Mot de passe:</label>
        <input type="text" id="txtMdp" name="txtMdp">

        <input id="btnConnec" class="bouton" value="Connexion"  type="submit">
        <input id="btninscri" class="bouton" value="Inscription"  type="submit">
    </form>

</div>


<div id="footer">
    <h2>Fait par : Marc-Antoine Bouchard</h2>
    <h3>Contactez-nous : 1933191@etu.cegepjonquiere.ca</h3>
</div>
</body>
</html>
