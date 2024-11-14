<?php
require_once '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM etudiants WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    echo "Étudiant non trouvé.";
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    // Mettre à jour les informations de l'étudiant
    $sql = "UPDATE etudiants SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $message = "Informations mises à jour avec succès.";
    } else {
        $message = "Erreur lors de la mise à jour des informations.";
    }
}
?>

<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier étudiant</title>
    <link rel="stylesheet" href="editForm.css">
    <link rel="shortcut icon" href="../1087815.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <h2>Modifier les informations de l'étudiant</h2>
        <form method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>
            <br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($etudiant['email']); ?>" required>
            <br>
            <?php if ($message): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <button type="submit">Mettre à jour</button>
        </form>
        <hr>
        <a href="editEtudiant.php"><button>Retour</button></a>
    </div>
</body>

</html>