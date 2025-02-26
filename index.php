<!DOCTYPE html>
<html>
<head>
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>CONNEXION</h1>
        <form action="connexion.php" method="post">
            <input type="text" name="identifiant" placeholder="login"><br>
            <input type="password" name="mot_de_passe" placeholder="mot de passe"><br>
            <a href="#">Mot de passe oublier ?</a><br>
            <div class="button-container">
                <button type="submit">Se connecter</button>
                <button type="button" onclick="window.location.href='inscription.php'">Creer un compte</button>
            </div>
        </form>
    </div>
</body>
</html>



































