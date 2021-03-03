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

</body>

<div>
    <?php
    if (isset($_POST['login'])) {
        $email          = !empty($_POST['email']) ? trim($_POST['email']) : null;
        $password       = !empty($_POST['password']) ? trim($_POST['password']) : null;

        $sql = "SELECT idUser, email, password FROM User WHERE email = :email";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            //Finner ikke bruker
            die('Feil e-post eller passord');
        } else {
            //Fant bruker. Sjekker om passordet stemmer overens med passordet i databasen

            //sammenligner passord
            $validPassword = password_verify($password, $user['password']);

            //Hvis passordet stemmer får brukeren logget inn
            if ($validPassword) {
                $_SESSION['user_id'] = $user['idUser'];

                header('Location: index.php');
            } else {
                die('Feil e-post eller brukernavn');
            }
        }
    }
    ?>
</div>

<div>
    <form action="login.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Logg inn</h1>
                    <p>Fyll ut skjemaet med riktig informasjon</p>
                    <hr class="mb-3">
                    <label for="email"><b>E-post</b></label>
                    <input class="form-control" type="email" name="email" required>
                    <label for="password"><b>Passord</b></label>
                    <input class="form-control" type="password" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" name="login" value="Logg inn">
                </div>
            </div>
        </div>
    </form>
</div>
</html>