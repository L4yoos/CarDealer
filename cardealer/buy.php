<?php

if(isset($_POST['id'])){
    require '../config.php';

    $id = $_POST['id'];
                $cars = $conn->query("SELECT cena FROM cars WHERE id='$id'"); 
                $car = $cars->fetch();
                $zakup =$car['cena'];
            
                $counter_file = "../przychod.txt"; 
                if(!file_exists($counter_file)){ 
                $f = fopen($counter_file, "w"); 
                fwrite($f,"0"); 
                fclose($f); 
                }
                $f = fopen($counter_file, "r"); 
                $cena = fread($f, filesize($counter_file));
                $cena += $zakup;
                fclose($f);
                $f = fopen($counter_file, "w"); 
                fwrite($f, $cena); 
                fclose($f);
                

    if(empty($id)){
        echo 0;
    } else {
        $stmt = $conn->prepare("DELETE FROM cars WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            header("Location: ../komis.php?mess=success");
        } else {
            header("Location: ../komis.php?mess=error");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../komis.php?mess=error");
}

?>