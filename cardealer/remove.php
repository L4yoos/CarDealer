<?php

if(isset($_POST['id'])){
    $id = $_POST['id'];

    if(empty($id)){
        echo 0;
    } else {
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        } else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}

?>