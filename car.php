<?php
require 'config.php';
session_start();
if(($_SESSION["loggedIn"] != true) || ($_SESSION['is_admin'] != true)){
    header("Location: komis.php");
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis Samochodowy - DalunCAR</title>
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="css/list.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button"  data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="komis.php"><h2>Dalun<span>CAR</span></h2></a>
        </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="images/daluni.png" class="rounded-circle" height="35" alt="daluni chad" loading="lazy"/>
            </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="todolist/list.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="admin.php">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="car.php">Dodaj samochód!</a>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">Wyloguj sie!</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<main>
	<div class="container pt-4">
    <div class="row">
        <div class="col">
                <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-outline">
                <input type="text" name="marka" id="form8Example1" class="form-control" />
                <label class="form-label" for="form8Example1">Marka</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="model" id="form8Example2" class="form-control" />
                <label class="form-label" for="form8Example2">Model</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="number" name="cena" id="form8Example2" class="form-control" />
                <label class="form-label" for="form8Example2">Cena</label>
            </div>
        </div>
    </div>
<hr />
    <div class="row">
        <div class="col">
            <div class="form-outline">
                <input type="text" name="kolor" id="form8Example3" class="form-control" />
                <label class="form-label" for="form8Example3">Kolor</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="hp" id="form8Example4" class="form-control" />
                <label class="form-label" for="form8Example4">HP</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" name="typ_silnika" id="form8Example5" class="form-control" />
                <label class="form-label" for="form8Example5">Typ_silnika</label>
            </div>
        </div>
    </div>
<hr />
<div class="row">
    <div class="col">
    <div class="form-outline">
        <textarea class="form-control" name="description" id="textAreaExample" rows="4"></textarea>
        <label class="form-label" for="textAreaExample">Description</label>
    </div>
<hr />
    <div class="form-outline text-center">
        Wybierz zdjecie samochodu:
        <input type="file" name="file" id="fileToUpload">
        <input type="submit" name="submit">
    </div>
    </form>
    </div>
</div>
    </div>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>
</html>