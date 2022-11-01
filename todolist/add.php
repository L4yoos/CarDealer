<?php

if(isset($_POST['title'])){
    require '../config.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../todolist/list.php?mess=error");
    } else {
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../todolist/list.php?mess=success");
        } else {
            header("Location: ../todolist/list.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../todolist/list.php?mess=error");
}

?>