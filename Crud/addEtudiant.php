<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout étudiant</title>
    <link rel="stylesheet" href="../Crud/addEtudiant.css">
    <link rel="shortcut icon" href="../1087815.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <?php
        require_once '../config.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];
            $email = $_POST['email'];

            // Insérer des données (INSERT)
            $sql = "INSERT INTO etudiants (nom, prenom, age, email) VALUES (:nom, :prenom, :age, :email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                echo "Nouvel étudiant ajouté avec succès." . "<hr>";
            } else {
                echo "Erreur lors de l'ajout de l'étudiant.";
            }
        }

        // Récupérer des données (SELECT)
        $sql = "SELECT * FROM etudiants";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "ID : " . $row['id'] . " - Nom : " . $row['nom'] . ' - Prénom : ' . $row['prenom'] . ' - Email : ' . $row['email'] . "<br>";
        }
        ?>
        <hr>
        <a href="../index.php"><button>Retour</button></a>
    </div>
</body>

</html>