<?php
session_start();
// Récupérer le message de succès ou d'erreur
$success_message = $_SESSION['success'] ?? null;
$error_message = $_SESSION['error'] ?? null;

// Supprimer les messages de la session après les avoir récupérés
unset($_SESSION['success']);
unset($_SESSION['error']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion utilisateur</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <main>
        <div class="link_container">
            <a class="link" href="addUser.php">Ajouter un utilisateur</a>
        </div>

        <table>
            <thead>
                <?php
                include('../connect_ddb.php');

                // Récupérer les données de la table users
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Afficher les données de chaque ligne
                ?>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
            </thead>

            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['adresse']; ?></td>
                        <td><a href="editUser.php?id=<?php echo $row['user_id']; ?>"><img src="../images/write.png" alt=""></a></td>
                        <td><a href="deleteUser.php?id=<?php echo $row['user_id']; ?>"><img src="../images/remove.png" alt=""></a></td>
                    </tr>
            <?php
                    }
                } else {
                    echo "<p class='message'> Aucun résultat trouvé </p>";
                }
            ?>
            </tbody>
        </table>

    </main>


    <!-- Notification -->
    <div id="notification" class="notification"></div>

    <script>
        // Afficher la notification
        function showNotification(message, type) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `notification ${type}`;
            notification.style.display = 'block';

            // Masquer la notification après 5 secondes
            setTimeout(() => {
                notification.style.display = 'none';
            }, 5000);
        }

        // Afficher le message de succès ou d'erreur
        <?php if ($success_message) : ?>
            showNotification("<?php echo $success_message; ?>", "success");
        <?php endif; ?>

        <?php if ($error_message) : ?>
            showNotification("<?php echo $error_message; ?>", "error");
        <?php endif; ?>
    </script>

</body>

</html>