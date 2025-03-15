<?php
session_start();
include('../connect_ddb.php');
$sql = "DELETE FROM users WHERE user_id =" . $_GET['id'];

if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = "Utilisateur supprimé avec succès.";
    header('Location: showUser.php');
} else {
    $_SESSION['error'] = "Erreur lors de la suppression de l'utilisateur.";
}
