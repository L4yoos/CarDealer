<?php

if (isset($_POST["submit"]))
 {
    require 'config.php';
    error_reporting(1);
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $cena = $_POST['cena'];
    $kolor = $_POST['kolor'];
    $hp = $_POST['hp'];
    $typ_silnika = $_POST['typ_silnika'];
    $description = $_POST["description"];
    $filename = $_POST["file"];

    $pname = $_FILES["file"]["name"];
 
    $tname = $_FILES["file"]["tmp_name"];
   
    $uploads_dir = 'images';

    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    $sql = $conn->query("INSERT INTO cars (marka,model,cena,kolor,hp,typ_silnika,filename,description) VALUES('$marka', '$model', '$cena', '$kolor', '$hp', '$typ_silnika', '$pname', '$description')");
 
    $conn = null;
    header("Location: komis.php");
    exit();
 }
 else {
    header("Location: car.php");
}
?>