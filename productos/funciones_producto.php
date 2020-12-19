<?php
// incluye la clase Db
require_once('conexion.php');

	class FuncionesProducto{
		// constructor de la clase
		public function __construct(){}

		

		// método para mostrar todos los libros
		public function mostrar(){
			$db=ConectDB::conectar();
			$listaProductos=[];
			$result=$db->query('SELECT id,nombre,cantidad,categoria,precio,ingredientes, descripcion FROM producto');

			foreach($result->fetchAll() as $producto){
				$prod= new Producto();
				$prod->setId($producto['id']);
				$prod->setNombre($producto['nombre']);
				$prod->setPrecio($producto['precio']);
				$prod->setCantidad($producto['cantidad']);
				$prod->setCategoria($producto['categoria']);
				$prod->setIngredientes($producto['ingredientes']);
				$prod->setDescripcion($producto['descripcion']);
				$listaProductos[]=$prod;
			}
			return $listaProductos;
		}

		
	}
?>
