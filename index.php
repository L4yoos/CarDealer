<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if($result->rowCount() > 0) {
        $row = $result->fetch();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['ID'];
        $_SESSION['is_admin'] = $row['is_admin'];
        $_SESSION["loggedIn"] = true;
        if($row['is_admin'] === 1) {
            header("Location: admin.php");
        } else {
            header("Location: komis.php");
        }
    } else {
        echo '<script>alert("Niepoprawny Email lub hasło!")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list.css">
    <title>Komis Samochodowy - Login and Register</title>
</head>
<body>
    <div class="form-section">
        <form action="" method="POST">
            <h2 class="text" style="color:#ccc; font-size: 2rem; font-weight: 800;">Logowanie!</h2>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button name="submit">Zaloguj się!</button>
        <p style="color: #ccc;">Nie masz konta? <a href="register.php">Zarejestruj się!</a></p>
        </form>
    </div>
</body>
</html>