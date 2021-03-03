<?php
session_start();
require 'auth_pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title> Bruker registrering</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
    <?php
    if (isset($_POST['create'])) {
        $firstname      = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
        $lastname       = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
        $email          = !empty($_POST['email']) ? trim($_POST['email']) : null;
        $password       = !empty($_POST['password']) ? trim($_POST['password']) : null;
        $userRole       = 1;

        //Sjekker om e-posten allerede er i bruk
        $sql = "SELECT COUNT(email) AS num FROM User WHERE email = :email";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            die('E-posten er allerede i bruk!');
        }

        //Hasher passordet så det ikke blir lagret i klartekst
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (firstname, lastname, email, password, UserRole_idUserRole ) 
                VALUES (:firstname, :lastname, :email, :password, :UserRole_idUserRole)";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $passwordHash);
        $stmt->bindValue(':UserRole_idUserRole', $userRole);

        $result = $stmt->execute();

        if ($result){
            header('Location: login.php');
        }
    }
    ?>
</div>

<div>
    <form action="signup.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Registrering</h1>
                    <p>Fyll ut skjemaet med riktig informasjon</p>
                    <hr class="mb-3">
                    <label for="firstname"><b>Fornavn</b></label>
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Etternavn</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="email"><b>E-post</b></label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="password"><b>Passord</b></label>
                    <input class="form-control" type="password" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="create" value="Registrer">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>