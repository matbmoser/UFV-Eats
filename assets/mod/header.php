<?php include 'conexion.php';?>
<!doctype html>
<html lang="es">
<head>
	<title>UFV Eats: Inicio</title>
  <meta charset="utf-8">
 	<link rel="shortcut icon" href="">
 	<link href="../css/main.css" rel="stylesheet">
 	<link href="../bt/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 	
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<!--<script src="assets/js/dark-mode.js"></script>-->
<header class="header">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark shadow">
      <a class="navbar-brand" href="#">
      	<img id="mylogo" src="../../media/img/logo1.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <form class="form-inline mx-auto my-2 w-50" action="busquedabbdd.php">
            <input class="form-control mr-sm-1 w-75" name="producto" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light" type="submit" value="Submit"><i class="fas fa-search"></i></button>
        </form>
        <ul class="nav navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Contacto</a>
          </li>
          <li class="nav-item">
				  <a class="nav-link "href="/login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user mr-1 ml-1" style="color:white;"></i></a>
			    </li>
        	<li class="nav-item">
            	<button type="button" id="dark-mode" class="ml-3 btn btn-outline-light"><i class="fas fa-sun mr-1"></i><span>Light Mode</span></button>
          	</li>
        </ul>
    </div>
   </nav>
</header>