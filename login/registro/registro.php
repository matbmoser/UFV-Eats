<?php
include ("../../assets/mod/connect.php");
if (!$conexion) {
  die('No se ha podido conectar a la base de datos');
}

$errors = 10000;
$emailErr = "Invalid email format";
$table = "user";
$nombre = utf8_decode($_POST['inputname']);
$userid = utf8_decode($_POST['inputusrid']);
$email = utf8_decode($_POST['inputEmail']);
$clav = utf8_decode($_POST['inputPassword']);
$clav1 = utf8_decode($_POST['inputPassword1']);
if($nombre == "")
  $errors += 1000;
else if (strlen($nombre) >= 10) 
  $errors += 2000;

if($userid == "")
  $errors += 100;
else if (strlen($userid) >= 10) 
  $errors += 200;
else{
  $sol = mysqli_query($conexion,"SELECT * FROM ".$table." WHERE userid = '".$userid."'");
  if (mysqli_num_rows($sol) != 0)
    $errors += 300;
}

if($email == ""){
  $errors += 10;
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors += 20;
}
else{
  $sol = mysqli_query($conexion,"SELECT * FROM ".$table." WHERE email = '".$email."'");
  if (mysqli_num_rows($sol) != 0)
    $errors += 30;
}
if(strlen($clav) < 6){
  $errors += 1;
}
else if($clav!=$clav1){
  $errors += 2;
}
if($errors==10000){
  $clav = hash('sha512', $clav);
  $insert_value = "INSERT INTO ".$table." (name, userid, email, password) VALUES ('$nombre','$userid','$email','$clav')";
  mysqli_select_db($conexion, $db_name);
  mysqli_query($conexion, $insert_value);
}
echo $errors;
?>