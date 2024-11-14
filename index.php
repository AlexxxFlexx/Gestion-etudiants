<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion étudiants</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="./1087815.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <h2>Étudiants enrengistrés</h2>
        <hr>
        <?php
        // Récupérer des données (SELECT)
        $sql = "SELECT * FROM etudiants";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID : " . $row['id'] . " - Nom : " . $row['nom'] . ' - Prénom : ' . $row['prenom'] . ' - Email : ' . $row['email'] . "<br>";
        }
        ?>
        <hr>
        <div class="button-container">
            <a href="ajout.php"><button class="btn-ajouter">Ajouter un étudiant</button></a>
            <a href="./Crud/editEtudiant.php"><button class="btn-modifier">Modifier un étudiant</button></a>
            <a href="./Crud/deleteEtudiant.php"><button class="btn-supprimer">Supprimer un étudiant</button></a>
        </div>
    </div>
</body>

</html>