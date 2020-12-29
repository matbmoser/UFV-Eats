<?php include 'conexion.php';?>
<!doctype html>
<html lang="es">
<head>
	<title>UFV Eats: Inicio</title>
  <meta charset="utf-8">
 	<link rel="shortcut icon" href="">
 	<link href="../assets/css/main.css" rel="stylesheet">
 	<link href="../assets/bt/css/bootstrap.min.css" rel="stylesheet">
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
      	<img id="mylogo" src="../media/img/logo1.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

	<div class="input-group md-form form-sm form-2">
  			<input required name="PalabraClave" class="form-control my-0 py-1" type="text" placeholder="Busqueda producto" aria-label="Search">
  		<div class="input-group-append">
    		<span class="input-group-text" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>
 		</div>
	</div>

	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
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

<body>
  <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 760px;">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Contacto</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="contact.php" method="post" novalidate class="needs-validation">
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
</body>
<script src="../assets/js/form.js"></script>
</html>