<?php

if(isset($_POST['id'])){
    require '../config.php';

    $id = $_POST['id'];

    if(empty($id)){
        echo 'error';
    } else {
        $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uID = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1; 

        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE id=$uID");
        
        if($res){
            echo $checked;
        } else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../todolist/list.php?mess=error");
}

?>