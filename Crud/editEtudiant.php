<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier étudiant</title>
    <link rel="stylesheet" href="editEtudiants.css">
    <link rel="shortcut icon" href="../1087815.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h2>Modifier les informations des étudiants</h2>
        <hr>
        <?php
        require_once '../config.php';
        // Récupérer des données (SELECT)
        $sql = "SELECT * FROM etudiants";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='student-info'>";
            echo "ID : " . $row['id'] . " - Nom : " . $row['nom'] . ' - Prénom : ' . $row['prenom'] . ' - Email : ' . $row['email'];
            echo " <a href='editForm.php?id=" . $row['id'] . "'><img src='edit-icon.png' alt='Modifier' class='edit-icon'></a>";
            echo "</div>";
        }
        ?>
        <hr>
        <a href="../index.php"><button>Retour</button></a>
    </div>
</body>
</html>