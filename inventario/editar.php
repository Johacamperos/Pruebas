<?php 
    include "conex_bd.php";

	$id=$_GET['id'];
	
	$productos=mysqli_query($cn,"select * from `productos` where id='$id' ");
	$datos = mysqli_fetch_assoc($productos);
	
	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Editar Producto</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/estiloa.css" />
		<link rel="stylesheet" type="text/css" href="css/componentes.css" />
		<link rel="stylesheet" type="text/css" href="css/campos.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">		
	</head>	
	<body>
	
<br>	
<a href="index.php"><img src="imagenes/flec.png" width="40px">Atrás</a>

<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Información del Producto</h2>


<form action="guardar_cambios.php" method="POST">			
<table>
<input type="hidden" class="camp" id="id" name="id" value="<?php echo $datos['id']?>" style="width:200px;" readonly />

<tr>		
	<td><font color="#ffffff">Nombre de Producto:</font></td>	
	<td><input type="text" id="nombre_producto" class="camp" name="nombre_producto" value="<?php echo $datos['nombre_producto']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#ffffff">Referencia:</font></td>	
	<td><input type="text" id="referencia" class="camp" name="referencia" value="<?php echo $datos['referencia']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>

<tr>		
	<td><font color="#ffffff">Precio:</font></td>	
	<td><input type="number" id="precio" class="camp" name="precio" value="<?php echo $datos['precio']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#ffffff">Peso:</font></td>	
	<td><input type="number" id="peso" class="camp" name="peso" value="<?php echo $datos['peso']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#ffffff">Categoría:</font></td>	
	<td><input type="text" id="categoria" class="camp" name="categoria" value="<?php echo $datos['categoria']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>

<tr>		
	<td><font color="#ffffff">Stock:</font></td>	
	<td><input type="number" id="stock" class="camp" name="stock" value="<?php echo $datos['stock']?>" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>		
	<td><font color="#ffffff">Fecha de Creación:</font></td>	
	<td><input type="text" id="fecha_creacion" class="camp" name="fecha_creacion" value="<?php echo $datos['fecha_creacion']?>" style="width:200px;" readonly /></td>
</tr>
</table>
<br>
<input class="md-trigger" type="submit" value="GUARDAR" id="btn_inicia"/>	
</form>


</div>

</div>


		
	</body>
</html>
