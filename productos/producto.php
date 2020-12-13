<?php
	class Producto{
		private $id;
		private $imagen;
		private $nombre;
		private $precio;
		private $cantidad;
		private $categoria;
		private $ingredientes;
		private $descripcion;

		function __construct(){}
		
		public function getDescripcion(){
			return $this->descripcion;
		}

		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		
		public function getIngredientes(){
			return $this->ingredientes;
		}

		public function setIngredientes($ingredientes){
			$this->ingredientes = $ingredientes;
		}
		
		public function getCategoria(){
			return $this->categoria;
		}

		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		
		public function getCantidad(){
			return $this->cantidad;
		}

		public function setCantidad($cantidad){
			$this->cantidad = $cantidad;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getImagen(){
			return $this->imagen;
		}

		public function setImagen($imagen){
			$this->imagen = $imagen;
		}

		public function getPrecio(){
		return $this->precio;
		}

		public function setPrecio($precio){
			$this->precio = $precio;
		}
		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
	}
?>