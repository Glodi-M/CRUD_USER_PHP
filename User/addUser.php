<?php

if (isset($_POST['send'])) {

    if (
        isset($_POST["username"]) && isset($_POST['email'])
        && !empty($_POST['username']) && !empty($_POST['email'])
    ) {
        $username = $_POST["username"];
        $email = $_POST['email'];

        include('../connect_ddb.php');
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('Location: showUser.php');
            exit();
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <form action="" method="POST">
        <h1>Ajouter un utilisateur</h1>
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>

</body>

</html>