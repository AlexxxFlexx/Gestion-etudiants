<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer étudiant</title>
    <link rel="stylesheet" href="deleteEtudiant.css">
    <link rel="shortcut icon" href="../1087815.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h2>Supprimer un étudiant</h2>
        <hr>
        <?php
        require_once '../config.php';

        // Vérifier si un ID est passé dans l'URL pour suppression
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Supprimer l'étudiant de la base de données
            $sql = "DELETE FROM etudiants WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "<p class='message'>Étudiant supprimé</p>";
            } else {
                echo "<p class='message'>Erreur lors de la suppression de l'étudiant</p>";
            }
        }

        // Récupérer des données (SELECT)
        $sql = "SELECT * FROM etudiants";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='student-info'>";
            echo "ID : " . $row['id'] . " - Nom : " . $row['nom'] . ' - Prénom : ' . $row['prenom'] . ' - Email : ' . $row['email'];
            echo " <a href='deleteEtudiant.php?id=" . $row['id'] . "'><img src='delete.png' alt='Supprimer' class='delete-icon'></a>";
            echo "</div>";
        }
        ?>
        <hr>
        <a href="../index.php"><button>Retour</button></a>
    </div>
</body>
</html>