<?php
$username = "";
$rol = "1";
require_once("../../assets/mod/session.php");
require_once("../../assets/mod/token.php");
require("../../assets/mod/class.Producto.php");
require("../../assets/mod/class.Usuario.php");

if(!empty($username)){
    require("../../assets/mod/connect.php");
    $sql = "select * , rol as ROL from user where userid = '".mysqli_real_escape_string($conexion,$username)."'";
    if($result = $conexion->query($sql)) {
        $usuario = $result->fetch_object();
        $rol = $usuario->ROL;
        $miusuario = array();
        $miusuario["name"] = $usuario->name; 
        $miusuario["ID"] = $usuario->ID;
        $miusuario["userid"] = $usuario->userid;
        $miusuario["oauth_provider"] = $usuario->oauth_provider;
        $miusuario["email"] = $usuario->email;
        switch($rol){
            case "0":
                $miusuario["rol"] = "Administrador";
                break;
            case "1":
                $miusuario["rol"] = "Usuario";
                break;
            case "2":
                $miusuario["rol"] = "Especialista";
                break;    
        }
        $miusuario["created"] = $usuario->created;
        $miusuario["modified"] = $usuario->created;
        unset($usuario);
    }else{
        header("Location: ../index.php?result=3ad735ebae3ff8aae1b3dcafa8c8bbff3e877fab8fd9cf7f3c933240f0544a0b");
    }
}
if($rol != "" && $rol == "0"){
    $user = new Usuario();
    $userCond["return_type"] = "all";
    $usuarios = $user->getRows($userCond);

}

$producto = new Producto();
$productoCond['return_type'] = 'all';
$productos = $producto->getRows($productoCond);
// A partir de aquí puedes usar la variable $_GET con la URL limpia
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template · Bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/6d67b863f5.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/bt/css/bootstrap.min.css" rel="stylesheet">

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
        .body{
            color:;
        }
        .text-color {
            color: #ffffff;
            transition-duration: .5s;
        }

        .wrapper {
            margin: 0 auto;
            background: #212529;
        }

        .tabs {
            display: table;
            table-layout: fixed;
            width: 100%;
            -webkit-transform: translateY(5px);
            transform: translateY(5px);
            margin: 0;
            padding: 0;
        }
        .tabs > li {
            transition-duration: .25s;
            display: table-cell;
            list-style: none;
            text-align: center;
            padding: 20px 20px 25px 20px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            color: #ffffff;
        }
        .tabs > li:before {
            z-index: -1;
            position: absolute;
            content: "";
            width: 100%;
            height: 120%;
            top: 0;
            left: 0;
            background-color: rgba(146, 146, 146, 0.3);
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            transition-duration: .25s;
            border-radius: 5px 5px 0 0;
        }
        .tabs > li:hover:before {
            -webkit-transform: translateY(70%);
            transform: translateY(70%);
        }
        .tabs > li:hover{
            background: #f8f9fa;
            color: black;
        }
        .tabs > li.active {
            color: #ffffff;
        }
        .tabs > li.active:hover {
            color: black;
        }
        .tabs > li.active:before {
            transition-duration: .5s;
            background-color: #000000;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .tab__content {
            background-color: #000000;
            position: relative;
            width: 100%;
            border-radius: 5px;
        }
        .tab__content > li {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            list-style: none;
        }
        .tab__content > li .content__wrapper {
            text-align: center;
            border-radius: 5px;
            width: 100%;
            padding: 45px 40px 40px 40px;
            background-color: #000000;
        }

        .content__wrapper h2 {
            width: 100%;
            text-align: center;
            padding-bottom: 20px;
            font-weight: 300;
        }
        .content__wrapper img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        /* for custom scrollbar for webkit browser*/
        table{
            width:100%;
            position: relative;
            border-collapse: collapse;
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
            position: sticky;
            top:0;
        }
        .tbl-content{
            height: 55vh;
            overflow-x:auto;
            overflow-y:auto;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
        }
        th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }
        td{
            padding: 15px;
            text-align: left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255,255,255,0.1);
        }

        .add{
            position: relative;
            left: -18px;
            display: flex;
            bottom: 14px;
            font-size: 32px;
            transition: all .25s ease;

        }
        .add:hover{
            opacity: 0.6;
            transition: all .25s ease;
            cursor: pointer;
        }
        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(255, 255, 255, 0.3);
        }
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(252, 252, 252, 0.3);
        }
        #productoadd{
            display: none;
            transition: all .25s ease;
        }
        .modified{
            display: none;
        }
    </style>

</head>
<body>
<script src="../../assets/js/dark-mode.js"></script>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="d-flex justify-content-end align-items-center">
            <div class="m-2">
            <?php
            if ($username != "") {
                echo "<span style='color:white'>Welcome <strong>" . $username . "</strong>!</span>";
            } else {
                echo "<a class='nav-link'  href='../index.php?result=00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219'><span style='color:white'><strong>Log in</strong></span></a>";
            }
            ?>
            </div>
            <div>
            <a style="color: white" class="nav-link"
               href="../index.php?result=00270cf63f93c307e7e9d2cc7e639fa50aca58eeb64be3266a798c9c19535219">Sign out</a>
            </div>
        </div>
        <!--<li class="nav-item text-nowrap">
        <button type="button" id="dark-mode" class="m-4 btn btn-outline-light"><i class="fas fa-sun mr-1"></i><span>Light Mode</span></button></div>
        </li>-->
</header>
<div class="p-0 container-fluid">
    <section class="wrapper">
        <ul class="tabs">
            <li class="m-2 active">Productos</li>
            <li class="m-2">Ver Perfil</li>
            <?php if($rol != "" && $rol == "0") {echo "<li class='m-2'>Usuarios</li>";} ?>
        </ul>
        <ul class="tab__content" style="height: 100%!important">
            <li class="tab__intern active">
                <div class="content__wrapper">
                <?php
                      if($rol != "" && $rol == "0") {
                            if(isset($_SESSION["__usrerr__"]) && $_SESSION["__usrerr__"] == "421"){
                            //Borrar cookie
                                unset($_SESSION["__usrerr__"]);
                                echo"<div class='mt-5 alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>¡Qué pena!</strong> No se ha podido añadir el producto
                                <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                        }
                    ?>
                    <h2 class="text-color">Productos Disponibles</h2>
                    <section class="productos">
                        <div class="tbl-content">
                            <table class="table table-responsive" cellpadding="0" cellspacing="0" border="0">
                                    <thead class="tbl-header">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Categoria</th>
                                        <th>Ingredientes</th>
                                        <th>Descripción</th>
                                        <?php if($rol != "" && $rol == "0") {
                                        echo "<th></th>";
                                        }?>
                                    </tr>
                                    </thead>
                                <tbody>
                                <?php
                                foreach ($productos as $producto){
                                    echo "<tr>
                                        <td>".$producto['id']."</td>
                                        <td>".$producto['imagen']."</td>
                                        <td>".$producto['nombre']."</td>
                                        <td>".$producto['precio']." €</td>
                                        <td>".$producto['cantidad']." kcal</td>
                                        <td>".$producto['categoria']."</td>
                                        <td>".$producto['ingredientes']."</td>
                                        <td>".$producto['descripcion']."</td>";
                                    if($rol != "" && $rol == "0") {
                                        echo " <td>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal" . $producto['id'] . "'>
                                              <i class='fas fa-times'></i>
                                            </button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                        <?php
                        if($rol != "" && $rol == "0") {
                        foreach ($productos as $producto) {
                            echo "
                        <div style='color:black' class='modal fade' id='exampleModal" . $producto['id'] . "' role='dialog' >
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>¿Estás seguro que quieres borrar este producto?</h5>
                                    <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                        <ul style='list-style: none;text-align: left'>
                                            <li><strong>ID</strong>: " . $producto['id'] . "</li>
                                            <li><strong>Imagen</strong>: " . $producto['imagen'] . "</>
                                            <li><strong>Nombre</strong>: " . $producto['nombre'] . "</li>
                                            <li><strong>Precio</strong>: " . $producto['precio'] . " €</li>
                                            <li><strong>Cantidad</strong>: " . $producto['cantidad'] . " kcal</li>";
                                            if(!empty($producto['categoria'])){echo "<li><strong>Categoria</strong>: " . $producto['categoria'] . "</li>";}
                                            echo "<li><strong>Ingredientes</strong>: " . $producto['ingredientes'] . "</li>
                                            <li><strong>Descripción</strong>: " . $producto['descripcion'] . "</li>
                                        </ul>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                    <button type='button' class='btn btn-danger'>Borrar</button>
                                </div>
                            </div>
                        </div>
                        </div>";
                        }}?>
                        </div>
                    </section>
                        <?php
                        if($rol != "" && $rol == "0") {
                        echo"<i class='add fas fa-plus-circle'></i>";
                        }?>
                </div>
                <?php
                 if($rol != "" && $rol == "0") {
                    echo" <div class='content__wrapper' >
                    <div id = 'productoadd' >
                    <div style='    padding: 3rem!important;
    background-color: #f2f2f2;
    color: black;' class='container p-4'>
                        <form class='text-left needs-validation' action='../../assets/mod/addProducto.php' method='post' autocomplete='off'>
                          <div class='form-group row'>
                            <label for='inputEmail3' class='col-sm-2 col-form-label'>Nombre</label>
                            <div class='col-sm-10'>
                              <input type='text' name='nombre' class='form-control' id='inputEmail3' placeholder='Nombre'>
                            </div>
                          </div>
                          <br>
                          <div class='form-group row'>
                            <label for='inputPassword3' class='col-sm-2 col-form-label'>Precio (€)</label>
                            <div class='col-sm-10'>
                              <input type='number' min='0.5' max='10000000' name ='precio' class='form-control' id='inputPassword3' placeholder='Precio'>
                            </div>
                          </div>
                          <br>
                          <div class='form-group row'>
                            <label for='inputPassword3' class='col-sm-2 col-form-label'>Calorías (kcal)</label>
                            <div class='col-sm-10'>
                              <input type='number' min='1' max='10000000' name ='Calorias' class='form-control' id='inputPassword3' placeholder='Calorias'>
                            </div>
                          </div>
                          <br>
                          <div class='form-group row'>
                            <label for='inputPassword3' class='col-sm-2 col-form-label'>Categoria</label>
                            <div class='col-sm-10'>
                                    <select name='categorias' class='custom-select mr-sm-2' id='inlineFormCustomSelect'>
                                        <option selected>Choose...</option> 
                                        <option value=''>Ninguna</option>
                                        <option value='Vegano'>Vegano</option>
                                        <option value='Vegetariano'>Vegetariano</option>
                                        <option value='Intolerancia'>Intolerancia</option>
                                        <option value='Proteica'>Proteica</option>
                                        <option value='Hipocalorica'>Hipocalorica</option>
                                        <option value='Hipercalorica'>Hipercalorica</option>
                                         <option value='Alergia'>Alergia</option>
                                      </select>
                            </div>
                          </div>
                          <br>
                         <div class='form-group row'>
                            <label for='inputEmail3' class='col-sm-2 col-form-label'>Ingredientes</label>
                            <div class='col-sm-10'>
                              <input type='text' name='ingredientes' class='form-control' id='inputEmail3' placeholder='Ingredientes'>
                            </div>
                          </div>
                          <br>
                          <div class='form-group row'>
                            <label for='inputEmail3' class='col-sm-2 col-form-label'>Descripción</label>
                            <div class='col-sm-10'>
                               <textarea class='form-control' name='Descripcion' rows='3' placeholder='Descripción' id='comment'></textarea>
                            </div>
                          </div>
                          <br>
                         <div class='form-group row'>
                            <label for='inputEmail3' class='col-sm-2 col-form-label'>Imagen</label>
                            <div class='col-sm-10'>
                          <div class='custom-file'>
                          <input type='file' class='custom-file-input' id='customFile'>
                         </div>
                         </div> 
                        </div>
                        <br>
                          <div class='form-group row'>
                            <div class='col-sm-10' style='float: right'>
                              <button type='submit' class='btn btn-primary'>Sign in</button>
                            </div>
                          </div>
                        </form>
                    </div>
                    </div >
                </div >";
                }
                ?>
            </li>
            <?php
            if(isset($miusuario)){
           echo" <li class='tab__intern'>
                <div class='content__wrapper'>
                    <h2 class='text-color'>Mi perfil</h2>
                    <div class='container'>
                    <ul style='list-style: none;text-align: left'>
                                           <li><strong>ID</strong>: ".$miusuario['ID']."</li>
                                            <li><strong>Proveedor</strong>: " . $miusuario['oauth_provider'] . "</>
                                            <li><strong>Nombre</strong>: " . $miusuario['name'] . "</li>
                                            <li><strong>Username</strong>: " . $miusuario['userid'] . " </li>
                                            <li><strong>Email</strong>: " . $miusuario['email'] . "</li>
                                            <li><strong>Rol</strong>: " . $miusuario['rol'] . "</li>
                                           <li><strong>Creación</strong>: " . $miusuario['created'] . "</li>
                                           <li><strong>Modificado</strong>: " . $miusuario['modified'] . "</li>
                                        </ul>
                    </div>
                </div>
            </li>
            ";}
            ?>
            <?php
            if($rol != "" && $rol == "0") {
                echo "<li class='tab__intern'>
                <div class='content__wrapper'>
                    <h2 class='text-color'>Usuarios</h2>
                     <section>
                        <div class='tbl-content'>
                            <table class='table table-responsive' cellpadding='0' cellspacing='0' border='0'>
                                    <thead class='tbl-header'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Proveedor</th>
                                        <th>Nombre</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        ";if($rol != '' && $rol == '0') {
                                        echo '<th></th>';}
                                        echo"<th>Created</th>
                                        <th>Modified</th>
                                        ";if($rol != '' && $rol == '0') {
                                        echo '<th></th>';}
                                        echo"
                                    </tr>
                                    </thead>
                                <tbody>
                                ";
                                foreach ($usuarios as $usuario){
                                    echo '<tr>
                                        <td>'.$usuario['ID'].'</td>
                                        <td>'.$usuario['oauth_provider'].'</td>
                                        <td>'.$usuario['name'].'</td>
                                        <td>'.$usuario['userid'].' </td>
                                        <td>'.$usuario['email'].'</td>
                                        <td><div class="dropdown">';

                                        switch($usuario['rol']){
                                            case "0":
                                                echo "<span id='rol".$usuario['ID']."'>Administrador</span><button type='button' id='dropdownMenuLink".$usuario['ID']."' style='padding: 6px 12px;color:white' class='btn' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fas fa-pen-square'></i></button>";
                                                break;
                                            case "1":
                                                echo "<span id='rol".$usuario['ID']."'>Usuario</span>";
                                                break;
                                            case "2":
                                                echo "<span id='rol".$usuario['ID']."'>Especialista</span>";
                                                break;    
                                        }
                                        echo'  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink'.$usuario['ID'].'">
                                            <a style="cursor:pointer;" class="dropdown-item" onclick="modify(this,'.$usuario['ID'].','.$usuario['rol'].')">Administrador</a>
                                            <a style="cursor:pointer;" type="buttom" class="dropdown-item" onclick="modify(this,'.$usuario['ID'].','.$usuario['rol'].')">Usuario</a>
                                            <a style="cursor:pointer;" type="buttom" class="dropdown-item" onclick="modify(this,'.$usuario['ID'].','.$usuario['rol'].')">Especialista</a>
                                          </div></div>
                                        <td class="modified"><button type="button" class="btn btn-success">Save</button></td> 
                                        <td>'.$usuario['created'].'</td>
                                        <td>'.$usuario['modified'].'</td>';
                                    if($rol != '' && $rol == '0') {
                                        echo "<td>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#userModal" . $usuario['ID'] . "'>
                                              <i class='fas fa-times'></i>
                                            </button>
                                        </td>";
                                        echo '</tr>';
                                    }
                                }
                                echo "
                                </tbody>
                            </table>
                        </div>
                        <div class='container'>
                        ";
                        if($rol != '' && $rol == '0') {
                        foreach ($usuarios as $usuario) {
                            echo "
                         <div style='color:black' class='modal fade' id='userModal". $usuario['ID'] . "' role='dialog' >
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>¿Estás seguro que quieres borrar este usuario</h5>
                                    <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                        <ul style='list-style: none;text-align: left'>
                                            <li><strong>ID</strong>: ".$usuario['ID']."</li>
                                            <li><strong>Proveedor</strong>: " . $usuario['oauth_provider'] . "</>
                                            <li><strong>Nombre</strong>: " . $usuario['name'] . "</li>
                                            <li><strong>Username</strong>: " . $usuario['userid'] . " </li>
                                            <li><strong>Email</strong>: " . $usuario['email'] . "</li>";
                                            echo "<li><strong>Rol</strong>: ";
                                                switch($usuario['rol']){
                                                case "0":
                                                    echo "Administrador";
                                                    break;
                                                case "1":
                                                    echo "Usuario";
                                                    break;
                                                case "2":
                                                    echo "Especialista";
                                                    break;    
                                            }echo"</li>
                                           <li><strong>Creación</strong>: " . $usuario['created'] . "</li>
                                           <li><strong>Modificado</strong>: " . $usuario['modified'] . "</li>
                                        </ul>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                    <button type='button' class='btn btn-danger'>Borrar</button>
                                </div>
                            </div>
                        </div>
                        </div>";
                        }}
                        echo "</div>
                    </section>
                </div>
                </li>";
            }
            ?>
        </ul>
    </section>
</div>
<script src="../../assets/js/smooth-scroll.js"></script>
<script src="../../assets/js/jarallax.min.js"></script>
<script src="../../assets/bt/js/bootstrap.bundle.js"></script>
<script src="../../assets/js/parallax.js"></script>
<script>
    $(function () {
        $(".add").click(function () {
            $("#productoadd").toggle("slow");
            $(".add").toggleClass("fa-plus-circle");
            $(".add").toggleClass("fa-minus-circle");
            $(".productos").toggle("slow");
        });
    });

        function modify(param, id, rol) {
            let nombre = "#rol" + id;
            let num = "";
            switch($(nombre).html()){
                case "Administrador":
                    num = "0";
                    break;
                case "Usuario":
                    num = "1";
                    break;
                case "Especialista":
                    num = "2";
                    break;

            }
            if (rol === num) {
                $(".modified").hide();
            }
            else{
                if ($(nombre).html() !== param.innerHTML) {
                    $(nombre).html(param.innerHTML);
                    $(".modified").show();
                }
            }
            }
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $(document).ready(function(){

        // Variables
        var clickedTab = $(".tabs > .active");
        var tabWrapper = $(".tab__content");
        var activeTab = tabWrapper.find(".active");
        var activeTabHeight = activeTab.outerHeight();

        // Show tab on page load
        activeTab.show();

        // Set height of wrapper on page load
        tabWrapper.height(activeTabHeight);

        $(".tabs > li").on("click", function() {

            // Remove class from active tab
            $(".tabs > li").removeClass("active");

            // Add class active to clicked tab
            $(this).addClass("active");

            // Update clickedTab variable
            clickedTab = $(".tabs .active");

            // fade out active tab
            activeTab.fadeOut(250, function() {

                // Remove active class all tabs
                $(".tab__content > .tab__intern").removeClass("active");

                // Get index of clicked tab
                var clickedTabIndex = clickedTab.index();

                // Add class active to corresponding tab
                $(".tab__content > .tab__intern").eq(clickedTabIndex).addClass("active");

                // update new active tab
                activeTab = $(".tab__content > .active");

                // Update variable
                activeTabHeight = activeTab.outerHeight();

                // Animate height of wrapper to new tab height
                tabWrapper.stop().delay(50).animate({
                    height: activeTabHeight
                }, 500, function() {

                    // Fade in active tab
                    activeTab.delay(50).fadeIn(250);

                });
            });
        });
    });
</script>
</body>
</html>
