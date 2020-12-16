<?php
$username = "";
include("../../assets/mod/session.php");
include("../../assets/mod/token.php");
include("../../assets/mod/class.Producto.php");
include("../../assets/mod/class.Usuario.php");
if(!empty($username)){
    $usuario = new Usuario();
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
    <script src="../../assets/js/libs/jquery/jquery-3.5.1.slim.min.js"></script>
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
        </ul>
        <ul class="tab__content" style="height: 100%!important">
            <li class="active">
                <div class="content__wrapper">
                    <h2 class="text-color">Productos Disponibles</h2>
                    <section>
                        <div class="tbl-content">
                            <table class="table table-responsive" cellpadding="0" cellspacing="0" border="0">
                                    <thead class="tbl-header">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Ingredientes</th>
                                        <th>Descripción</th>
                                        <th></th>
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
                                        <td>".$producto['ingredientes']."</td>
                                        <td>".$producto['descripcion']."</td>
                                        if(<td>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal".$producto['id']."'>
                                              <i class='fas fa-times'></i>
                                            </button>
                                        </td>
                                        </tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                        <?php
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
                                            <li><strong>Cantidad</strong>: " . $producto['cantidad'] . " kcal</li>
                                            <li><strong>Ingredientes</strong>: " . $producto['ingredientes'] . "</li>
                                            <li><strong>Descripcion</strong>: " . $producto['descripcion'] . "</li>
                                        </ul>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                    <button type='button' class='btn btn-danger'>Borrar</button>
                                </div>
                            </div>
                        </div>
                        </div>";
                        }?>
                        </div>
                        <i class="add fas fa-plus-circle"></i>
                    </section>
                </div>
                <div class="content__wrapper">
                    <div id="productoadd">
                        hola
                    </div>
                </div>
            </li>
            <li>
                <div class="content__wrapper">
                    <h2 class="text-color">Her</h2>
                </div>
            </li>
            <li>
                <div class="content__wrapper">
                    <h2 class="text-color">About</h2>
                </div>
            </li>
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
            $("#productoadd").toggle();
            $(".add").toggleClass("fa-plus-circle");
            $(".add").toggleClass("fa-minus-circle");
        });
    });

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
                $(".tab__content > li").removeClass("active");

                // Get index of clicked tab
                var clickedTabIndex = clickedTab.index();

                // Add class active to corresponding tab
                $(".tab__content > li").eq(clickedTabIndex).addClass("active");

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
