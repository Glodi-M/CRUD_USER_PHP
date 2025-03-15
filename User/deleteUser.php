<?php
include('../connect_ddb.php');
$sql = "DELETE FROM users WHERE user_id =" . $_GET['id'];

if (mysqli_query($conn, $sql)) {
    header('Location: showUser.php');
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}
