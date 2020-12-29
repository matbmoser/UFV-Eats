<?php
    if(!empty($_GET)){ //Checkeamos si la variable GET esta puesta
        if(isset($_GET['result'])){
            if($_GET['result'] == "3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b"){
                setcookie("PHPSESSID","", time() - 3600, "/");
                setcookie("__chgn", "",time() - 3600, "/");
                setcookie("__efbr", "",time() - 3600,"/");
                setcookie("__err__", "TRUE",0.2,"/");
            }
        }else{
            header("Location:   index.php");
        }
    }
    $user = "";
    $pass = "";
    //require_once("../assets/mod/googleoauth.php");
    require_once("../assets/mod/requestuser.php");
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mathias Brunkow Moser">
    <link rel="icon" href="../media/favicon.ico" type="image/x-icon">
    <title>Login</title>
      <script src="../assets/js/libs/jquery/jquery-3.5.1.slim.min.js"></script>
      <script src="https://kit.fontawesome.com/6d67b863f5.js" crossorigin="anonymous"></script>
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
<body class="body">
<script src="../assets/js/dark-mode.js"></script>
  <header class="fixed-top">
      <div class="container-fluid p-0">
          <div class="row">
              <div class="col-4 d-flex justify-content-start align-items-center"><a id="return"class="m-4" href="../"><i style="font-size: 2em" class="far fa-arrow-alt-circle-left mr-1"></i></a></div>
              <div class="col-8 d-flex justify-content-end"><button type="button" id="dark-mode" class="m-4 btn btn-outline-light"><i class="fas fa-sun mr-1"></i><span>Light Mode</span></button></div>
          </div>
      </div>
    </header>
<main class="form-signin" >
  <form  class="needs-validation" id="loginform" method="post" autocomplete="off" novalidate>
    <div class="text-center p-5">
      <img id="logo" src="../media/img/logo2.png" alt="" width="250" height="65">
    </div>
     <!-- <li><a href="<?php //echo $gpLoginURL; ?>" class="google"><i class="fab fa-google mr-2"></i></i><span>Iniciar sesión con Google</span></a></li>-->
    <div class="form-label-group">
      <input type="email" id="inputEmail" value="<?php echo $user?>" class="form-control" name="names" placeholder="Email address" required>
      <label for="inputEmail">Email address</label>
      <div class="invalid-feedback">
                            Por favor introduza su correo!
                        </div>
                        <div class="valid-feedback">
                            OK!
                        </div>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" value="<?php echo $pass?>" class="form-control" name="numbers" placeholder="Password" required>
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
        <input type="checkbox" id="remember" value="check"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    <div class="mb-1 form-label-group">
      <p class="mt-3">¿Todavía no tienes una cuenta? <a href="registro/">Registrate</a></p>
    </div>
    <?php
    if(isset($_GET['result'])){
      if($_GET['result'] == "1"){
        echo "<div class='mt-5 alert alert-success d-flex justify-content-between align-items-center fade show' role='alert'>
        <span><strong class='mr-2'>Enhorabuena!</strong>El login ha sido realizado!</span>
        <button type='button' class='spinner-border ml-4 text-success bg-transparent' data-dismiss='alert' aria-label='Close'></button>
      </div>";
      }
      else if ($_GET['result'] == "0"){
      echo"<div class='mt-5 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>¡Qué pena!</strong> Algo salió mal. Intente hacer el login otra vez.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
      </div>";
      }else if($_GET['result'] == "3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b"){
        echo"<div class='mt-5 text-justify alert alert-warning alert-dismissible fade show'  role='alert' style='text-align: justify;'>
        <strong>¡Error de Seguridad!</strong> Hemos detectado un intento de falla de seguridad en su cuenta!
        La hemos bloqueado por seguridad, vuelva a hacer el login, sentimos las molestias.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";

        session_start();
        session_unset();
        session_destroy();
        unset($_SESSION["token"]);
        unset($_SESSION["id"]);
        session_write_close();
        session_start();
        header("Location:   index.php");
      }
      else if($_GET['result'] == "00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219"){
        session_unset();
        session_destroy();
        unset($_SESSION["token"]);
        unset($_SESSION["id"]);
        session_write_close();
        header("Location:   index.php");
      }
      else{
        header("Location:   index.php");
      }
    }
    if(isset($_COOKIE["__err__"]) && $_COOKIE["__err__"] == "TRUE"){
        echo"<div class='mt-5 text-justify alert alert-warning alert-dismissible fade show'  role='alert' style='text-align: justify;'>
        <strong>¡Error de Seguridad!</strong> Hemos detectado un intento de falla de seguridad en su cuenta!
        La hemos bloqueado por seguridad, vuelva a hacer el login, sentimos las molestias.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";
        unset($_SESSION["token"]);
        unset($_SESSION["id"]);
        setcookie("__err__", "",time() - 3600,"/");
    }
    ?>
        <div id="demo" class='mt-5 alert alert-info d-flex justify-content-center align-items-center fade show' role='alert'>
        <span><strong class='mr-2'>Cargando...</strong></span>
        <button type='button' class='spinner-border ml-4 text-info bg-transparent' data-dismiss='alert' aria-label='Close'></button>
      </div>
  </form>
</main>
<script src="../assets/bt/js/bootstrap.js"></script>
<script src="../assets/js/libs/crypto-js/aes.js"></script>
<script src="../assets/js/check.js"></script>
    <style>
        a.google {
            border-color: #eee !important;
            color: #333;
            color: #fff;
            background-color: #E44439;
        }
        a.google:hover, a.google:active {
            opacity: 0.8;
        }
    </style>
  </body>
</html>
