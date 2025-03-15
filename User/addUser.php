<?php

if (isset($_POST['send'])) {

    if (
        isset($_POST["username"]) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['telephone']) && isset($_POST['adresse'])
        && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['telephone']) && !empty($_POST['adresse'])
    ) {
        $username = $_POST["username"];
        $firstname = $_POST['firstname'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];

        include('../connect_ddb.php');
        $sql = "INSERT INTO users (username,firstname,telephone,email,adresse) VALUES ('$username','$firstname', '$telephone','$email', '$adresse')";

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
        <input type="text" name="firstname" placeholder="Prénom" required>
        <input type="text" name="telephone" placeholder="Téléphone" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="adresse" placeholder="Adresse" required>
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="showUser.php">Annuler</a>
    </form>

</body>

</html>