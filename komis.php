<?php

require 'config.php';
session_start();
if($_SESSION["loggedIn"] != true){
    header("Location: index.php");
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
        <?php if($_SESSION['is_admin'] == true) { ?>
          <li>
            <a class="dropdown-item" href="todolist/list.php">Todolist</a>
          </li>
          <li>
            <a class="dropdown-item" href="admin.php">Panel Administracyjny</a>
          </li>
          <li>
            <a class="dropdown-item" href="car.php">Dodaj Samochód!</a>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">Wyloguj sie!</a>
          </li>
        <?php } else { ?>
          <li>
            <a class="dropdown-item" href="logout.php">Wyloguj sie!</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<main>
	<div class="container pt-4">
		<section class="cars">
			<div class="row">
			    <?php $cars = $conn->query("SELECT * FROM cars ORDER BY id ASC"); while($car = $cars->fetch(PDO::FETCH_ASSOC)) { ?>
		    <div class="col-xl-3 col-sm-6 col-12 mb-4">
		        <div class="card text-center">
			        <div class="bg-image hover-overlay ripple" id="0<?php echo $car['id'] ?>" data-mdb-ripple-color="light">
				        <img src="images/<?php echo $car['filename']?>" class="img-fluid" />
				        <a href="#!">
					        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
        		        </a>
      		        </div>
		        <div class="card-body">
                    <h5 class="card-title"><?php echo $car['marka']." ".$car['model']?></h5>
                    <p class="card-text">
                    <?php echo $car['description'] ?>
                    <div class="d-flex justify-content-around flex-column mb-3">
                        <div class="p-2 text-dark">Kolor: <?php echo $car['kolor'] ?> <i class="fa-solid fa-droplet"></i></div>
                        <div class="p-2 text-dark">HP: <?php echo $car['hp'] ?> <i class="fa-solid fa-car"></i></div>
                        <div class="p-2 text-dark">Typ Silnika: <?php echo $car['typ_silnika'] ?> <i class="fa-solid fa-filter"></i></div>
                        <div class="p-2 align-self-center bg-danger text-white">Cena: <?php echo $car['cena'] ?>$ <i class="fa-solid fa-wallet"></i></div>
                    </div>
                <div class="footer pt-4">
                    <button type="button" id="<?php echo $car['id'] ?>" class="buy btn btn-success">Kup!</button>
                </div>
      	        </div>
    	        </div>
		    </div>
			    <?php } ?>
			</div>
		</section>
	</div>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            $('.buy').click(function(){
                const id = $(this).attr('id');
                $.post("cardealer/buy.php", 
                {
                    id: id
                },
                (data) => {
                    if(data){
                        $(this).closest('div').parent().hide(900);
                        $("#0"+id).hide(900);
                        Swal.fire({
                              icon: 'success',
                              title: 'Udany Zakup!',
                              text: 'Zakupiles Samochod z komisu DalunCAR, życzymy miłej jazdy!',
                              timer: 2500
                        });
                    }
                });
            });
        });
</script>
</body>
</html>