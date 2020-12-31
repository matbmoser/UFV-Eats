<?php
	function Mostrarproducto($cat){
			include("assets/mod/connect.php");
		if (!$conexion) {
		die('No se ha podido conectar a la base de datos');
	}
	else{

	$table = "producto";
	$result=mysqli_query($conexion,"SELECT * FROM ".$table."");
	$cols=mysqli_num_rows($result);
	$mos=0;
	for($id=1; $id <= $cols; $id++){
		if($cat == "none"){
			$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."'");
		}
		else if($cat=="DietaEspecial"){
			$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."' AND (categoria = 'Hipocalorica' OR categoria = 'Hipercalorica' OR categoria = 'Proteica')");
		}else if($cat=="VeganoVegetariano"){
			$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."' AND (categoria = 'Vegano' OR categoria = 'Vegetariano')");
		}else{
			$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."' AND categoria = '".$cat."'");
		}
	
	$res=mysqli_fetch_array($so1);
	if(isset($res)){
		if($res['categoria']=="Hipocalorica" || $res['categoria']=="Hipercalorica" || $res['categoria']=="Proteica")
		$categoria = "Especial";
		else if($res['categoria']=="Vegetariano" || $res['categoria']=="Vegano")
		$categoria = "Veg";
		else
		$categoria = mysqli_real_escape_string($conexion,$res['categoria']);
	?>
	<div class="colu col-sm-6 col-md-4 col-lg-3">
		<div class="tot">
			<div class="cont">
				<img class="dip1" src="media/img/<?php echo $res['imagen']; ?>"/>
				<?php
						if($categoria!=""){
				?>
				<img class="icon" src="media/icon/<?php echo $categoria; ?>.png"/>
				<?php
				}
				?>
			</div>  	
				<div class="dat">
					<div class="nom">
						<h6 class="neg"><?php echo $res['nombre']; ?></h6>
					</div>
					<h6 class="neg"><?php echo $res['precio']?> € <br> <?php echo $res['cantidad']?> kcal</h6>
				</div>
				<a href="#producto<?php echo $res['id']; ?>" class="btn-open-popup"><div class="info dat">
					Más información
				</div>
				</a>
		</div>   
	</div>
	<div class="container-all" id="producto<?php echo $res['id']; ?>">
		<div class="popup">
			<div class="img"><img class="dip1" src="media/img/<?php echo $res['imagen']; ?>"/></div>
			<div class="container-text">
				<?php
					if($res['categoria']=="Hipocalorica" || $res['categoria']=="Hipercalorica" || $res['categoria']=="Proteica")
					$categoria = "Especial";
					else if($res['categoria']=="Vegetariano" || $res['categoria']=="Vegano")
					$categoria = "Veg";
					else
					$categoria = mysqli_real_escape_string($conexion,$res['categoria']);
						if($categoria!=""){
				?>
				<img class="iconspecial" src="media/icon/<?php echo $categoria; ?>.png"/>
				<?php
				}
				?>
				<div class="nom">
						<h1 class="neg"><?php echo $res['nombre']; ?></h1>
				</div>				
				<p><h5 class="neg">Descripción:</h5><?php echo $res['descripcion']; ?></p>
				<p><h5 class="neg">Ingredientes:</h5><?php echo $res['ingredientes']; ?></p>
				<p><h5 class="neg">Calorias:</h5><?php echo $res['cantidad']; ?> kcal</p>
				<p><h5 class="neg">Precio:</h5><?php echo $res['precio']; ?> €</p>
			</div>
			<a href="#" class="btn-close-popup">X</a>
		</div>

	</div>
	<?php
}
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link href="assets/bt/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/6d67b863f5.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<link rel="icon" href="media/favicon.ico" type="image/x-icon">
	<title>UFVeats</title>
<style>
	a{
		text-decoration: none!important;
	}
	.selected{
		background:var(--color)!important;
		color:var(--bg-color)!important;
		transition: all .25s ease;
	}
</style>
</head>
<script src="assets/js/dark-mode.js"></script>
<?php include("assets/mod/getproductos.php") ?>
<header class="header sticky-top">
    <nav class="navbar navbar-expand-lg shadow justify-content-sm-start">

      <a class="navbar-brand order-0 order-lg-0 ml-lg-0 ml-2 mr-auto" href="#">
      	<img id="mylogo" src="media/img/logo1.png">
      </a>

      <button class="navbar-toggler align-self-start mt-3" style="border-radius: 0!important;" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>

	<div style="background:var(--bg-color);" class="collapse navbar-collapse" id="navbarText">
		<div  class="p-3 w-100 align-items-center d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end">
		<div class="d-flex w-100 align-items-center justify-content-center">
          <div class="autocomplete">
            <input class="form-control mr-sm-1 busqueda" id="myInput" autocomplete="off" type="text" placeholder="Búsqueda producto">
          </div>
            <button class="invertbd btn" data-target="producto" id="search" data-toggle='modal'><i class="fas fa-search"></i></button>
        </div>
        <ul class="navbar-nav d-flex align-items-center">
          <li class="nav-item active">
            <a class="invert nav-link" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="invert nav-link" href="./about/">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="invert nav-link" href="#" data-toggle="modal" data-target="#myModal">Contacto</a>
          </li>
          <li class="nav-item">
				  <a class="nav-link " href="./login/" ><i class="invert icono far fa-user mr-1 ml-1"></i></a>
			    </li>
		</ul>
        <button type="button" id="dark-mode" class="ml-1 btn btn-outline-light"><i class="fas fa-sun mr-1"></i><span>Light Mode</span></button>
	</div>
	</div>
   </nav>
</header>



<script>
$(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Coge el formulario al que queremos añadir el estilo de validación
    var forms = document.getElementsByClassName('needs-validation');
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
});

</script>
 
<script>
  var contador = 1;
 
function menu(){
 
    if(contador == 1){

      $(".mobileMenu").animate({
        right: '0'
      });
      contador = 0;
    } else {
      contador = 1;
      $(".mobileMenu").animate({
        right: '-200%'
      });
    }
 
}; 

$(document).ready(function(){
  $(".navbar-toggler").click( function() {
    menu(); 
  });
});
$(document).ready(function(){
	var search = document.getElementById("search");
	search.addEventListener('click',function(){
		var producto = document.getElementById("search").dataset["target"];
	if(producto !== "producto"){
		window.location.href = "./#"+producto;
	}
	});
});

</script>
<script>
function autocomplete(inp, arr, ids) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' data-id='"+ids[i]+"' id='opt"+ids[i]+"' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              let id = this.getElementsByTagName("input")[0].dataset["id"];
              document.getElementById("search").dataset["target"] = "producto"+id;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), productos, idproductos);

</script>
<script>
$(document).ready(function(){
    $('#open').on('click', function(){
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
    });
 
    $('#close').on('click', function(){
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
});
</script>
<body>
  <div class="mb-5 mt-3">
			<div class="p-0 container-fluid bots">
				<div class="row">
					<div class="mt-2 col-md-3">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "VeganoVegetariano" ){echo'href="./"'; }else{echo'href="./?categoria=VeganoVegetariano"';}}else{echo'href="./?categoria=VeganoVegetariano"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "VeganoVegetariano"){echo "selected";} }?> w-100 btn btn-default btn-lg bot">Vegano/Vegetariano</span>
					</a>
					</div>
					<div class="mt-2 col-md-3">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Intolerancia" ){echo'href="./"'; }else{echo'href="./?categoria=Intolerancia"';}}else{echo'href="./?categoria=Intolerancia"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Intolerancia"){echo "selected";} }?> w-100 btn btn-default btn-lg bot">Intolerancia</span>
					</a>
					</div>
					<div class="mt-2 col-md-3">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "DietaEspecial" ){echo'href="./"'; }else{echo'href="./?categoria=DietaEspecial"';}}else{echo'href="./?categoria=DietaEspecial"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "DietaEspecial"){echo "selected";} }?> w-100 btn btn-default btn-lg bot">Dieta Especial</span>
					</a>
					</div>
					<div class="mt-2 col-md-3">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Alergia" ){echo'href="./"'; }else{echo'href="./?categoria=Alergia"';}}else{echo'href="./?categoria=Alergia"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Alergia"){echo "selected";} }?> w-100 btn btn-default btn-lg bot">Alergia</span>
					</a>
					</div>
				</div>
			</div>
			<div class="container-fluid bots">
				<div class="row">
				<div <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "VeganoVegetariano" ){echo'style="display:block"'; }else{echo'style="display:none"';}}else{echo'style="display:none"';}?> class="mt-2 col-lg-4">
				<a <?php if(isset($_GET["subcategoria"])){ if($_GET["subcategoria"] == "Vegano"){echo'href="./"'; }else{echo'href="./?subcategoria=Vegano&categoria=VeganoVegetariano"';}}else{echo'href="./?subcategoria=Vegano&categoria=VeganoVegetariano"';}?>>
						<span class="<?php if(isset($_GET["subcategoria"])){if($_GET["subcategoria"] == "Vegano"){echo "selected";} }?> btn btn-default btn-lg bot">Vegano</span>
					</a>
				<a <?php if(isset($_GET["subcategoria"])){ if($_GET["subcategoria"] == "Vegetariano"){echo'href="./"'; }else{echo'href="./?subcategoria=Vegetariano&categoria=VeganoVegetariano"';}}else{echo'href="./?subcategoria=Vegetariano&categoria=VeganoVegetariano"';}?>>
						<span class="<?php if(isset($_GET["subcategoria"])){if($_GET["subcategoria"] == "Vegetariano"){echo "selected";}} ?> btn btn-default btn-lg bot">Vegetariano</span>
					</a>
				</div>
				<div <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "DietaEspecial" ){echo'style="display:block"'; }else{echo'style="display:none"';}}else{echo'style="display:none"';}?> class="col-lg-4">

				</div>
				<div <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "DietaEspecial" ){echo'style="display:block"'; }else{echo'style="display:none"';}}else{echo'style="display:none"';}?> class="mt-2 col-lg-8">
					<a <?php if(isset($_GET["subcategoria"])){ if($_GET["subcategoria"] == "Proteica"){echo'href="./"'; }else{echo'href="./?subcategoria=Proteica&categoria=DietaEspecial"';}}else{echo'href="./?subcategoria=Proteica&categoria=DietaEspecial"';}?>>
						<span class="<?php if(isset($_GET["subcategoria"])){if($_GET["subcategoria"] == "Proteica"){echo "selected";} }?> btn btn-default btn-lg bot">Proteica</span>
					</a>
					<a <?php if(isset($_GET["subcategoria"])){ if($_GET["subcategoria"] == "Hipocalorica"){echo'href="./"'; }else{echo'href="./?subcategoria=Hipocalorica&categoria=DietaEspecial"';}}else{echo'href="./?subcategoria=Hipocalorica&categoria=DietaEspecial"';}?>>
						<span class="<?php if(isset($_GET["subcategoria"])){if($_GET["subcategoria"] == "Hipocalorica"){echo "selected";}} ?>  btn btn-default btn-lg bot">Hipocalorica</button>
					<a <?php if(isset($_GET["subcategoria"])){ if($_GET["subcategoria"] == "Hipercalorica"){echo'href="./"'; }else{echo'href="./?subcategoria=Hipercalorica&categoria=DietaEspecial"';} }else{echo'href="./?subcategoria=Hipercalorica&categoria=DietaEspecial"';}?>>
						<span class="<?php if(isset($_GET["subcategoria"])){if($_GET["subcategoria"] == "Hipercalorica"){echo "selected";} }?>  btn btn-default btn-lg bot">Hipercalorica</button>
					</a>
				</div>
      </div>
      </div>
			<div id="myModal" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 760px;">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Contacto</h4>
                            <button type="button" class="btn close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="assets/mod/contact.php" method="post" novalidate class="needs-validation">
                                <p> Rellene el siguiente formulario explicando de forma detallada el motivo de su consulta. </p>
                                <p> Los campos requeridos están marcados con *. </p>
                                <div class="form-group">
                                    <label for="name"> Nombre completo*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre completo..." required maxlength="50">
                                    <div class="valid-feedback">Valido</div>
                                    <div class="invalid-feedback">Completa este campo por favor.</div>
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required maxlength="50">
                                    <div class="valid-feedback">Valido</div>
                                    <div class="invalid-feedback">Completa este campo por favor.</div>
                                </div>
                                <div class="form-group">
                                    <label for="consulta"> Motivo de la consulta*</label>
                                    <select id="consulta" class="form-control" name="consulta" required>
                                        <option value="Ninguno">Elige..</option>
                                        <option value="Comida">Duda con alguna comida.</option>
                                        <option value="Web">Problema con la página web.</option>
                                        <option value="Otro">Otro.</option>
                                    </select>
                                    <div class="valid-feedback">Valido</div>
                                    <div class="invalid-feedback">Completa este campo por favor.</div>
                                </div>
                                <div class="form-group">
                                    <label for="asunto">Asunto*</label>
                                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto de la consulta..." maxlength="1000" required>
                                    <div class="valid-feedback">Valido</div>
                                    <div class="invalid-feedback">Completa este campo por favor.</div>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Mensaje*</label>
                                    <textarea class="form-control" type="textarea" name="mensaje" id="mensaje" placeholder="Escriba su mensaje aquí..." maxlength="6000" rows="7" required></textarea>
                                    <div class="valid-feedback">Valido</div>
                                    <div class="invalid-feedback">Completa este campo por favor.</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="cancel" class="btn btn-secondary btn-lg mr-4 ml-4 mt-3" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-lg mr-2 mt-3" id="btnContactUs">Enviar &rarr;</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			<div class="p-0 container-fluid prim">
			<div class="mr-0 ml-0 row">
			<?php
			if (empty($_GET["categoria"])&&empty($_GET["subcategoria"])) 
				Mostrarproducto("none");
			else if(empty($_GET["subcategoria"]))
				Mostrarproducto($_GET["categoria"]);
			else
				Mostrarproducto($_GET["subcategoria"]);
			?>
			</div>
			</div>
	
<style type="text/css">
	.bots{
		width: 95%;
	}
	.btn-open-popup{
		color:var(--color);
	}
	.row{
		text-align: center;
	}
	.tot{
		border: 2px solid #EEEEEE;
		width: 90%;
		border-radius: 10px;
		color:var(--color);
		border:1px solid var(--color);
		background: var(--bg-color);
	}
	.tot:hover{
		box-shadow: 0px 0px 15px 5px #EEEEEE;
		transform: scale(1.05);
		transition: all 0.2s ease-in-out;
	}

	.colu{
    margin: 1.5% auto;
    display: flex;
    justify-content: center;
	}
	.info:hover{
		background-color: var(--color);
		color:var(--bg-color)!important;
	}
	.info:hover a{
		color:var(--bg-color)!important;
	}
	.info{
		border-bottom-right-radius: 6px;
    	border-bottom-left-radius: 6px;
	}
	.dat{
		width: 100%;
		align-items: center;
		padding: 10px;
		border-top:1px solid var(--color);
		height: 60px;
		display: flex;
    	justify-content: center;
		color:var(--color);
	}
	.cont {
		height: 200px;
		position: relative;
		float: left;
		display: flex;
  		align-items: center;
	}
	.dat h6{
		margin: 0 auto;
	}
	.dip1{
		width: 100%;
		margin: auto;
		padding: 1px;
		border-radius: 11px;
		max-height: 200px;
	}
	.neg{
		font-weight: bold;
	}
	a{
		color: black;
		text-decoration: none;
	}
	a:hover{
		color: black;
	}
	.but:hover{
		background-color: black;
		color: white;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		cursor:pointer
	}
	.icon{
		width: 40px;
		position: absolute;
		top: 0;
		right: 0;
	}
	.iconspecial{
		width: 40px;
		position: absolute;
		top: 0;
		left: 0;
	}
	.ufv>img{
		height: 75px;
	}
	@import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
}



.container-all{
    width: 100%;
	height: 100%;
	top: 0;
    position: fixed;
    padding: 40px;
    visibility: hidden;
    opacity: 0;
    transition: all 600ms;
    z-index: 100;
}


.container-all:target{
    background: rgba(0,0,0,0.8);
    visibility: visible;
    opacity: 1;
	z-index: 2000;
}

.container-all:target .popup{
    top: 50%;
    left: 50%;
    transform: rotate(0deg) translate(-50%, -50%);
    visibility: visible;
    z-index: 100;
}


.popup{
    width: 100%;
    max-width: 800px;
    height: 500px;
    position: relative;
	display: flex;
	color:var(--bg-color)!important;
    background: var(--color);
    visibility: hidden;
    top: -80%;
    left: -80%;
    transform: rotate(90deg) translate(-150%, 230%);
    transition: all 600ms;
}


.img{
    width: 40%;
    background-image: url(../image/img4.jpg);
    background-size: cover;
	background-position: center;
	display:flex;
	align-items: center;
}

.container-text{
    width: 60%;
    padding: 38px;
	overflow-y: auto;
	color:var(--bg-color);
}


.container-text h1{
    font-size: 30px;
}

.container-text p{
    margin-top: 20px;
    font-size: 16px;
}


.btn-close-popup{
    width: 50px;
    height: 50px;
    position: absolute;
    right: -20px;
    top: -20px;
    padding: 20px;
    background: var(--bg-color);
    color: var(--color);
    border-radius: 50%;
	line-height: 10px;
	transition: all .25s ease;
}
.btn-close-popup:hover{
	background: var(--color);
	color: var(--bg-color);
	transition: all .25s ease;
}
.bot:hover{
	background: var(--color);
	color:var(--bg-color);
	transition: all .25s ease;
}
    .bot{
		margin: auto;
		box-shadow: none;
		border: 1px solid var(--color);
		border-radius: 0;
		color: var(--color);
		background: var(--bg-color);
    }

@media screen and (max-width: 900px){
    .popup{
        flex-direction: column;
        height: 100%;
        max-height: 800px;
    }
    
    .img{
        width: 100%;
        height: 40%;
    }
    
    .container-text{
        width: 100%;
        height: 60%;
        padding: 80px;
    }
    
}

@media screen and (max-width: 500px){
    .container-text{
        padding: 20px;
    }
    
    .container-text h1{
        font-size: 20px;
    }
    
    .container-text p{
        font-size: 12px;
    }
}

</style>
<script>

</script>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap');
        footer 
        {
            padding: 8em 0 10px 0;
			background: var(--bg-color);
			border-top: 1px solid var(--color);
			text-align: center;
			margin: 65px 26px 0 26px;
            display: block;
        }
        footer .copyright 
        {
            color: var(--color);
			list-style: none;
			font-family: 'Arial';
            text-align: center;
        }
        footer  p
        {
            color: var(--color);
            list-style: none;
            text-align: center;
            font-size: 1em;
            font-family: 'Arial';
		}
		footer  h1
        {
            color: var(--color);
            list-style: none;
            text-align: center;
			font-family: 'Arial';
			margin-bottom: 20px;
        }
        footer li 
        {
            display: inline;
            line-height: 3.5em;
            padding: 0.5em;
            font-family: 'Arial';
        }
        /* CSS margenes por abajo  */
        footer ul
        {
			padding: 0!important;
            margin-bottom: 1.5rem!important;
        }
        /* CSS info@ufveats.es */
        footer .copyright a
        {
            color: var(--color);
			font-family: 'Arial';
			padding: 0px 34px;
			font-weight: 400;
        }
        footer .copyright a:hover
        {
           opacity: 0.6;
        }
        /*  */
        footer .copyright table 
        {
          border: 1px solid var(--color);
          margin-left: auto;
          margin-right: auto;
        }
        /* CSS imagen sobre */
        footer .copyright img
        {
            display: block;
            width: 45px;
        }
        footer .eslogan li
        {
            color: var(--color);
            list-style: none;
            text-align: center;
            font-size: 1.5em;
            font-family: 'Arial';
        }
		footer .email{
			font-size: 36px;
			padding: 6px 10px;
			border-right: 1px solid var(--color);
			color: var(--color);
		}
        </style>
    <footer id="footer">
        <h1>¿Tienes Dudas?</h1>
        <ul class="copyright">
            <table>
                <tr>
                       <th><i class="email fas fa-envelope"></i></th>
					   <th><a href="mailto:ufveats@gmail.com">ufveats@gmail.com</a></th>
				</tr>
            </table> 
        </ul>
        <ul class="copyright">
            <li><strong>UFV eats</strong></li>
            <span class="punt">|</span>
			<li>Todos los derechos reservados</li>
			<span class="punt">|</span>
			<li> ©️2020 - 2021 </li>
    
        </ul>
        <ul class="eslogan">
            <li>"Por una cafeteria para todos"</li>
        </ul>
        <ul class="ufv"> 
                <img src="media/img/Ufv2.png"></img>
        </ul>
    </footer>
</body>
<script src="assets/bt/js/bootstrap.min.js"></script>
<script src="assets/js/smooth-scroll.js"></script>
</html>