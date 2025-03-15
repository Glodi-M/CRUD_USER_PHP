<?php
$user_id = $_GET['id']; // Récupérer l'id de l'utilisateur à supprimer
include('../connect_ddb.php');
$sql = "DELETE FROM users WHERE user_id = $user_id";

if (mysqli_query($conn, $sql)) {
    header('Location: showUser.php');
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}
