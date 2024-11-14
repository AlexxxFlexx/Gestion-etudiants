<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout étudiant</title>
    <link rel="stylesheet" href="ajout.css">
    <link rel="shortcut icon" href="./1087815.ico" type="image/x-icon">
</head>
<body>
    <form action="./Crud/addEtudiant.php" method="post">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" required><br><br>
        <label for="age">Âge :</label><br>
        <input type="number" id="age" name="age" required><br><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Valider">
        <a href="index.php"><button type="button">Retour</button></a>
    </form>
</body>
</html>