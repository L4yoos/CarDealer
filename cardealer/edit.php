<?php

if(isset($_POST['updatedata'])){
    require '../config.php';

    $id = $_POST['id'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $is_admin = $_POST['is_admin'];

    if(empty($id)){
        echo 0;
    } else {
        $stmt = $conn->prepare("UPDATE users SET username='$user', email='$email', is_admin='$is_admin' WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            header("Location: ../admin.php?mess=success");
        } else {
            header("Location: ../admin.php?mess=error");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../admin.php?mess=error");
}

?>