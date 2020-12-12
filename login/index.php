<?php
    if(!empty($_GET)){ //Checkeamos si la variable GET esta puesta
        if(isset($_GET['result'])){
            if($_GET['result'] == "3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b" || $_GET['result'] == "00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219"){
            session_start();
            }
        }else{
            header("Location:   index.php");
        }
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.75.1">
    <title>Floating labels example · Bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/floating-labels/">
    <script src="https://kit.fontawesome.com/6d67b863f5.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/main.css" rel="stylesheet">
<link href="../assets/bt/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
<body>
<script src="../assets/js/dark-mode.js"></script>
  <header class="fixed-top d-flex justify-content-end align-items-middle">
    <button type="button" id="dark-mode" class="m-4 btn btn-outline-light"><i class="fas fa-sun mr-1"></i><span>Light Mode</span></button>
    </header>
<main class="form-signin" >
  <form  class="needs-validation" id="loginform" method="post" novalidate>
    <div class="text-center p-5">
      <img id="mylogo" src="../media/img/logo2.png" alt="" width="250" height="65">
    </div>

    <div class="form-label-group">
      <input type="email" id="inputEmail" class="form-control" name="names" placeholder="Email address" required>
      <label for="inputEmail">Email address</label>
      <div class="invalid-feedback">
                            Por favor introduza su correo!
                        </div>
                        <div class="valid-feedback">
                            OK!
                        </div>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" name="numbers" placeholder="Password" required>
      <label for="inputPassword">Password</label>
      <div class="invalid-feedback">
                            Por favor introduza su contraseña!
                        </div>
                        <div class="valid-feedback">
                            OK!
                        </div>
    </div>
        
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    
    <?php
    if(isset($_GET['result'])){
      if($_GET['result'] == "1"){
        echo "<div class='mt-5 alert alert-success d-flex justify-content-between align-items-center fade show' role='alert'>
        <span><strong class='mr-2'>Enhorabuena!</strong>El login ha sido realizado!</span>
        <button type='button' class='spinner-border ml-4 text-success bg-transparent' data-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
      else if ($_GET['result'] == "0"){
      echo"<div class='mt-5 alerta alert-danger alert-dismissible fade show' role='alert'>
        <strong>¡Que pena!</strong> Algo salió mal. Intente hacer el login otra vez.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
      </div>";
      }else if($_GET['result'] == "3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b"){
        echo"<div class='mt-5 text-justify alerta alert-warning alert-dismissible fade show'  role='alert' style='text-align: justify;'>
        <strong>¡Error de Seguridad!</strong> Hemos detectado un intento de falla de seguridad en su cuenta!
        La hemos bloqueado por seguridad, vuelva a hacer el login, sentimos las molestias.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";
        session_unset();
        session_destroy();
        session_write_close();
      }
      else if($_GET['result'] == "00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219"){
        session_unset();
        session_destroy();
        session_write_close();

      }
      else{
        header("Location:   index.php");
      }
    }
    ?>
        <div id="demo" class='mt-5 alert alert-info d-flex justify-content-center align-items-center fade show' role='alert'>
        <span><strong class='mr-2'>Cargando...</strong></span>
        <button type='button' class='spinner-border ml-4 text-info bg-transparent' data-dismiss='alert' aria-label='Close'></button>
      </div>
  </form>
</main>
<script src="../assets/bt/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>

    
  </body>
</html>
