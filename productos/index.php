
<?php
require_once('funciones_producto.php');
require_once('producto.php');
$funciones=new FuncionesProducto();
$producto= new Producto();
//obtiene todos los productos con el método mostrar de la clase funciones
$listaProductos=$funciones->mostrar();
?>

<html>
<head>
	<title>Mostrar Productos</title>
</head>
<body>
	<table border=1>
		<head>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Categoria</td>
			<td>Ingredientes</td>
			<td>Descripcion</td>
		</head>
		<body>
			<?php foreach ($listaProductos as $prod) {?>
			<tr>
				<td><?php echo $prod->getNombre() ?></td>
				<td><?php echo $prod->getPrecio() ?></td>
				<td><?php echo $prod->getCantidad()?> </td>
				<td><?php echo $prod->getCategoria()?> </td>
				<td><?php echo $prod->getIngredientes()?> </td>
				<td><?php echo $prod->getDescripcion()?> </td>
			</tr>
			<?php }?>
		</body>
	</table>
	<a href="index.php">Volver</a>
</body>
</html>



<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ufveats";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT nombre FROM producto";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "Producto: ".$row["nombre"]."<br>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);*/



?>