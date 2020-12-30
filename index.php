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
		if($cat == "none")
				$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."'");
		else
		$so1=mysqli_query($conexion,"SELECT * FROM ".$table." WHERE id = '".$id."' AND categoria = '".$cat."'");
	
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
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link href="assets/bt/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/bt/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="icon" href="media/favicon.ico" type="image/x-icon">
	<title>UFVeats</title>
<style>
	a{
		text-decoration: none!important;
	}
	.selected{
		background:var(--bg-color)!important;
		color:var(--color)!important;
		transition: all .25s ease;
	}
</style>
</head>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
	<div class="container prim">
		<div class="row">
			<h2>Productos</h2>
			<div class="container bots">
				<div class="row">
				<div class="col-lg-6">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Alergia"){echo'href="./"'; }}else{echo'href="./?categoria=Alergia"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Alergia"){echo "selected";} } ?> btn btn-default btn-lg bot">Alergia</span>
					</a>
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Proteica"){echo'href="./"'; }}else{echo'href="./?categoria=Proteica"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Proteica"){echo "selected";} }?> btn btn-default btn-lg bot">Proteica</span>
					</a>
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Hipercalorica"){echo'href="./"'; }}else{echo'href="./?categoria=Hipercalorica"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Hipercalorica"){echo "selected";} }?> btn btn-default btn-lg bot">Hipercalorica</button>
					</a>
				</div>
				<div class="col-lg-6">
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Hipocalorica"){echo'href="./"'; }}else{echo'href="./?categoria=Hipocalorica"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Hipocalorica"){echo "selected";}} ?> btn btn-default btn-lg bot">Hipocalorica</button>
					</a>
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Vegetariano"){echo'href="./"'; }}else{echo'href="./?categoria=Vegetariano"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Vegetariano"){echo "selected";}} ?> btn btn-default btn-lg bot">Vegetariano</span>
					</a>
					<a <?php if(isset($_GET["categoria"])){ if($_GET["categoria"] == "Vegano"){echo'href="./"'; }}else{echo'href="./?categoria=Vegano"';}?>>
						<span class="<?php if(isset($_GET["categoria"])){if($_GET["categoria"] == "Vegano"){echo "selected";} }?> btn btn-default btn-lg bot">Vegano</span>
					</a>
				</div>
			</div>
			</div>

			<?php
			if (empty($_GET["categoria"]))
				Mostrarproducto("none");
			else
				Mostrarproducto($_GET["categoria"]);
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
		background: var(--bg-color);
	}
	.tot:hover{
		box-shadow: 0px 0px 15px 5px #EEEEEE;
		transform: scale(1.05);
		transition: all 0.2s ease-in-out;
	}

	.colu{
		margin: 1.5% auto;
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
		border-top: 1px solid #EEEEEE;
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
    z-index: 100;
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
    background: white;
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
    background: black;
    color: white;
    border-radius: 50%;
    line-height: 10px;
}
.bot:hover{
	background: var(--bg-color);
	color:var(--color);
	transition: all .25s ease;
}
    .bot{
		width: 32.5%;
		height: 50px;
		margin: auto;
		box-shadow: none;
		border: 1px solid var(--color);
		border-radius: 0;
		background: var(--color);
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
</body>
</html>