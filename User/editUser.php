<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>


    <?php

    include('../connect_ddb.php');

    $sql = "SELECT * FROM users WHERE user_id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
    ?>

        <form action="" method="post">

            <h1>Modifier un utilisateur</h1>
            <input type="text" name="username" value="<?= $row['username']; ?>" required>
            <input type="text" name="firstname" value="<?= $row['firstname']; ?>" required>
            <input type="text" name="telephone" value="<?= $row['telephone']; ?>" required>
            <input type="email" name="email" value="<?= $row['email']; ?>" required>
            <input type="text" name="adresse" value="<?= $row['adresse']; ?>" required>
            <input type="submit" value="Modifier" name="send">
            <a class="link back" href="showUser.php">Annuler</a>
        </form>

    <?php
    }

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


            $sql = "UPDATE users SET username = '$username', firstname='$firstname', telephone = '$telephone', email = '$email', adresse = '$adresse' WHERE user_id = " . $_GET['id'];

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

</body>

</html>