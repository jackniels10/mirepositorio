<?php
// Configuraci�n de la conexi�n a la base de datos
//Ip de la pc servidor de base de datos
define("DB_HOST","localhost");

//Nombre de la base de datos
define("DB_NAME", "bdinmobiliaria");

//Usuario de la base de datos
define("DB_USERNAME", "root");

//Contraseña del usuario de la base de datos
define("DB_PASSWORD", "");

//definimos la codificación de los caracteres
define("DB_ENCODE","utf8");

//Definimos una constante como nombre del proyecto
define("PRO_NOMBRE","inmobiliaria");

// Crear conexi�n
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexi�n
if ($conn->connect_error) {
    die("Conexi�n fallida: " . $conn->connect_error);
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P?gina web inmobiliaria con Bootstrap</title>
  <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

  <!-- Encabezado superior -->
  <div class="container-fluid  text-black py-2" style="background:#FDBA30; ">
    <h3 class="text-center">Inmobiliaria Pucallpa S.A</h3>
  </div>

  <!-- Divisi?n de oficinas disponibles -->
  <div class="container mt-4">
    <h2 class="text-center">Inmuebles</h2>
	<div class="row py-2"></div>
	
    <div class="row">
<?php
// Consulta para obtener los registros de la tabla
$sql = "SELECT * FROM inmueble";
$result = $conn->query($sql);

// Verificar si se encontraron registros
if ($result->num_rows > 0) {
 
    while($row = $result->fetch_assoc()) {
       
	   $tipo_inmueble=$row["tipo"];
	   
    	if($tipo_inmueble=='1'){ $ti="OFICINA"; }
		if($tipo_inmueble=='2'){ $ti="CENTRO COMERCIAL"; }
		if($tipo_inmueble=='3'){ $ti="EDIFICIO"; }

?>
 
		  <div class="col-lg-4 col-md-6 mb-4">
			<div class="card">
			  <img src="img/<?php echo $row["foto"]; ?>" class="card-img-top" width="500" height="300">
			  <div class="card-body">
				<h5 class="card-title"><?php echo $ti;  ?></h5>
				<p class="card-text"><?php echo $row["descripcion"]; ?></p>
				<a href="#" class="btn btn-primary">Contratar</a>
			  </div>
			</div>
		  </div>
	  
<?php

}
    
} else {
    echo "No se encontraron registros.";
}

// Cerrar la conexi�n
$conn->close();
?>
    </div>
  </div>

  <!-- Agrega los enlaces a los archivos JavaScript de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
