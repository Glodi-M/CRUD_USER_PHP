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
            <input type="email" name="email" value="<?= $row['email']; ?>" required>
            <input type="submit" value="Modifier" name="send">
            <a class="link back" href="showUser.html">Annuler</a>
        </form>

    <?php
    }

    if (isset($_POST['send'])) {

        if (
            isset($_POST["username"]) && isset($_POST['email'])
            && !empty($_POST['username']) && !empty($_POST['email'])
        ) {
            $username = $_POST["username"];
            $email = $_POST['email'];

            $sql = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = " . $_GET['id'];

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