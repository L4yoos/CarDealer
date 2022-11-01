<?php

require 'counter.php';
require 'config.php';
if(($_SESSION["loggedIn"] != true) || ($_SESSION['is_admin'] != true)){
    header("Location: komis.php");
    exit;
}

$users = $conn->query("SELECT * FROM users ORDER BY id ASC");
$Ucount = $users->rowCount();
$cars = $conn->query("SELECT * FROM cars ORDER BY id ASC");
$Ccount = $cars->rowCount();

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
        <section class="rows-section">
	        <div class="row">
	            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-success"><?php echo $Ucount; ?></h3>
                                <p class="mb-0">Ilość Użytkowników</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fa-solid fa-user text-success fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-primary"><?php echo $Ccount ?></h3>
                                <p class="mb-0">Ilość Samochodów</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fa-solid fa-car text-primary fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                            <div>
                                <h3 class="text-danger"><?php echo $count ?></h3>
                                <p class="mb-0">Wszystkie Wizyty</p>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-map-signs text-danger fa-3x"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success"><?php   $counter_file = "przychod.txt"; $f = fopen($counter_file, "r"); 
                                    $cena = fread($f, filesize($counter_file)); echo $cena ?>$</h3>
                                    <p class="mb-0">Przychód</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa-solid fa-wallet text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>			
	        </div>
        </section>
<section class="table-section">
<div class="card">
    <div class="card-header text-center py-3">
        <h5 class="mb-0 text-center"><strong><i class="fa-solid fa-user"></i> Tabela Użytkowników</strong></h5>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-sm table-hover text-nowrap">
            <thead>
    			<tr>
      				<th scope="col">ID</th>
      				<th scope="col">Username</th>
      				<th scope="col">Email</th>
      				<th scope="col">Is_admin</th>
      				<th scope="col">Opcje</th>
    			</tr>
  			</thead>
  			<tbody>
  				<?php while($user = $users->fetch(PDO::FETCH_ASSOC)) { ?>
    			<tr>
					<th scope="row"><?php echo $user['ID'] ?></th>
					<td><?php echo $user['username'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td><?php echo $user['is_admin'] ?></td>
      				<td> 
						<button type="button" id="<?php echo $user['ID'] ?>" class="del btn btn-link btn-sm px-3" data-ripple-color="dark">
						<i class="fas fa-times"></i>
                        </button>
                         
						<button type="button" id="<?php echo $user['ID'] ?>" class="edit btn btn-link btn-sm px-3" data-ripple-color="dark"> 
						<i class="fa-solid fa-user-pen"></i> </button>
        			
						<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        				<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edytuj Użytkownika</h5>
									<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
								</div>
					<form action="cardealer/edit.php" method="POST">
						<div class="modal-body">
							<input type="hidden" name="id" id="id">
							<div class="form-outline mb-4">
							    <input type="text" name="username" id="form1" class="form-control" placeholder="Wpisz nazwe użytkownika">
                                <label class="form-label" for="form1">Username</label>
							</div>
							<div class="form-outline mb-4">
								<input type="text" name="email" id="form2" class="form-control" placeholder="Wpisz email">
                                <label class="form-label" for="form2"> Email </label>
							</div>
							<div class="form-outline mb-4">
								<input type="text" name="is_admin" id="form3" class="form-control" placeholder="(0 : 1)">
                                <label class="form-label" for="form3"> Is_admin </label>
							</div>
                    	</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Zamnkij</button>
							<button type="submit" name="updatedata" class="btn btn-primary">Aktualizuj Użytkownika</button>
						</div>
                	</form>
            				</div>
        				</div>
    					</div>
        			</td>
    			</tr>
    			<?php } ?>
  			</tbody>
		</table>
	</div>
</div>
	</div>
</div>
</section>
    </div>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            $('.del').click(function(){
                const id = $(this).attr('id');
                const logid = $("input").attr('id');
                if(id == logid)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Nie mozesz usunac samego siebie!',
                            timer: 5000
                            });

                            return;
                        }
                $.post("cardealer/remove.php", 
                {
                    id: id
                },
                (data) => {
                    if(data){
                        Swal.fire({
                              icon: 'success',
                              title: 'Usunales Użytkownika!',
                              timer: 1500
                        });
                    }
                });
            });
            $('.edit').click(function () {
                const id = $(this).attr('id');
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#id').val(id);

                });
        });
    </script>
</body>
</html>