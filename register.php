<?php

include 'config.php';

error_reporting(0);

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $cpassword = hash('sha256', $_POST['cpassword']);

    if($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if(!$result->num_rows > 0) {
            $sql = "INSERT INTO users(username, email, password)
            VALUES ('$user', '$email', '$password')";
            $result = $conn->query($sql);
        if($result) {
            echo '<script>alert("Brawo zarejestrowales sie!")</script>';
            $user = '';
            $email= '';
            $_POST['password'] = '';
            $_POST['cpassword'] = '';
        } else {
            echo '<script>alert("Coś poszło nie tak!")</script>';
        }
    } else {
        echo '<script>alert("Taki Mail jest juz zarejestrowany!")</script>';
    }
    
    } else {
        echo '<script>alert("Hasła się nie zgadzają!")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list.css">
    <title>Komis Samochodowy - Login and Register</title>
</head>
<body>
    <div class="form-section">
        <form method="POST" action="">
            <h2 class="text" style="color:#ccc; font-size: 2rem; font-weight: 800;">Rejestracja</h2>
            <input type="text" placeholder="Username" name="username" value="<?php echo $user?>" required>
            <input type="email" placeholder="Email" name="email" value="<?php echo $email?>" required>
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password'] ?>" required>
            <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword'] ?>" required>
            <button name="submit">Zarejestruj się!</button>
            <p style="color: #ccc;">Masz konto? <a href="index.php">Zaloguj się!</a></p>
        </form>
    </div>
</body>
</html>