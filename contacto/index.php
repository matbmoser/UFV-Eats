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