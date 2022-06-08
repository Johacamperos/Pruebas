<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Inventario</title>
		<link rel="shortcut icon" href="imagenes/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/componentes.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
<script type="text/javascript">
	function ConfirmDelete()
	{
	var respuesta = confirm('Estas seguro que deseas eliminar el producto?');
	
	if (respuesta == true)
		{
			return true;
		}	
	else
		{
			return false;
		}
	
	}
</script>		
	</head>	
	<body>
	


<br>

<a href="#openModaltwo"><img src="imagenes/new.png" width="40px">Nuevo Producto</a>
<a href="#openModal"><img src="imagenes/new.png" width="40px">Nueva Venta</a>

<br><br>	

<?php
include "conex_bd.php";

	$mastock=mysqli_query($cn,"SELECT productos.stock,productos.nombre_producto,productos.id, SUM(productos.stock) AS masstock FROM productos GROUP BY productos.id ORDER BY SUM(productos.stock) DESC LIMIT 1 ");
	$masto = mysqli_fetch_assoc($mastock);
	
?>
<center>
<div style="background:#ffffff;color:#000;width:200px;border-radius:20px;padding:15px;">Producto con más stock: <b><?php echo $masto['nombre_producto'];?></b> <br>ID del producto: <b><?php echo $masto['id'];?></b></div>
</center>

<br>

<table style="color:#ffffff;width:90%;" border=1 align="center" cellpadding=1 cellspacing=1>
    <tr>
    <td colspan="13" bgcolor="#ff6900"><CENTER><strong><font color='white'>Inventario</font></strong></CENTER></td>
    </tr>
        <tr bgcolor="#000000">
            <th class="color">ID</th>
			<th class="color">Nombre de Producto</th>
            <th class="color">Referencia</th>
			<th class="color">Precio</th>
			<th class="color">Peso</th>
			<th class="color">Categoría</th>
			<th class="color">Stock</th>
			<th class="color">Fecha de Creación</th>
			<th class="color">Editar</th>
			<th class="color">Eliminar</th>
        </tr>
    
    <?php	
$sql = ("SELECT * FROM productos ORDER BY id");
$mostar = mysqli_query($cn, $sql);


    while ($row = mysqli_fetch_array($mostar)) {
		
?>

 <tr>
	<td style="color:#fff;"><?php echo $row["id"]; ?></td>
	<td style="color:#fff;"><?php echo $row["nombre_producto"]; ?></td>
	<td style="color:#fff;"><?php echo $row["referencia"]; ?></td>
	<td style="color:#fff;"><?php echo $row["precio"]; ?></td>
	<td style="color:#fff;"><?php echo $row["peso"]; ?></td>
	<td style="color:#fff;"><?php echo $row["categoria"]; ?></td>
	<td style="color:#fff;"><?php echo $row["stock"]; ?></td>
	<td style="color:#fff;"><?php echo $row["fecha_creacion"]; ?></td>
	<td><a href="editar.php?id=<?php echo $row['id']?>">Editar</a></td>
	<td><a href="eliminar.php?id=<?php echo $row['id']?>" onclick="return ConfirmDelete()">Eliminar</a></td>
	
 </tr> 
<?php		
    }
    ?>
</table>



<br>
<br>

<br><br>	

<?php
	$masven=mysqli_query($cn,"SELECT ventas.id_producto,productos.id,productos.nombre_producto, SUM(ventas.cantidad) AS masvendido FROM ventas,productos WHERE ventas.id_producto=productos.id GROUP BY ventas.id_producto ORDER BY SUM(ventas.cantidad) DESC LIMIT 1 ");
	$mas = mysqli_fetch_assoc($masven);
	

	
?>
<center>
<div style="background:#ffffff;color:#000;width:200px;border-radius:20px;padding:15px;">Producto más vendido: <b><?php echo $mas['nombre_producto'];?></b> <br>ID del producto: <b><?php echo $mas['id_producto'];?></b></div>
</center>
<br>
<table style="color:#ffffff;width:90%;" border=1 align="center" cellpadding=1 cellspacing=1>
    <tr>
    <td colspan="13" bgcolor="#3aee79"><CENTER><strong><font color='white'>Ventas</font></strong></CENTER></td>
    </tr>
        <tr bgcolor="#000000">
            <th class="color">ID</th>
			<th class="color">Nombre de Producto</th>
            <th class="color">Referencia</th>
			<th class="color">Precio</th>
			<th class="color">Peso</th>
			<th class="color">Categoría</th>
			<th class="color">Cantidad</th>
			<th class="color">Fecha de la venta</th>
        </tr>
    
    <?php
include "conex_bd.php";
	
$sql1 = ("SELECT * FROM productos,ventas WHERE productos.id=ventas.id_producto ORDER BY id");
$mostarventas = mysqli_query($cn, $sql1);


    while ($rowv = mysqli_fetch_array($mostarventas)) {
		
?>

 <tr>
	<td style="color:#fff;"><?php echo $rowv["id"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["nombre_producto"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["referencia"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["precio"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["peso"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["categoria"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["cantidad"]; ?></td>
	<td style="color:#fff;"><?php echo $rowv["fecha_venta"]; ?></td>
	
 </tr> 
<?php		
    }
    ?>
</table>



<?php
ini_set('date.timezone','America/Bogota');

$fechacrea=date("Y-m-d");
?>

<!-- Nueva Producto -->

<div id="openModaltwo" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<form action="add_producto.php" method="POST" enctype="multipart/form-data">
<br>		
<table>
<tr>
<td><font color="#000">Nombre del Producto:</font></td>
<td><input type="text" class="camp" id="nombre_producto" name="nombre_producto" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Referencia:</font></td>
<td><input type="text" class="camp" id="referencia" name="referencia" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Precio:</font></td>
<td><input type="number" class="camp" id="precio" name="precio" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Peso:</font></td>
<td><input type="number" class="camp" id="peso" name="peso" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Categoría:</font></td>
<td><input type="text" class="camp" id="categoria" name="categoria" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Stock:</font></td>
<td><input type="number" class="camp" id="stock" name="stock" style="width:200px;" autocomplete="off" required /></td>
</tr>
<tr>
<td><font color="#000">Fecha de Creación:</font></td>
<td><input type="date" class="camp" id="fecha_creacion" name="fecha_creacion" value="<?php echo $fechacrea?>" style="width:200px;" readonly /></td>
</tr>

</table>
<br>
<input class="md-triggertt" type="submit" value="AGREGAR" id="btn_inicia"/>	
</form>
	</div>
</div>





<!-- Nueva Venta -->
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>

<form action="add_venta.php" method="POST" enctype="multipart/form-data">
<br>		
<table>
<tr>
<?php
   $tip = "SELECT * FROM productos ORDER BY id";
   $tequi=mysqli_query($cn,$tip);
?>		
	<td><font color="#000">Seleccione el ID del Producto:</font></td>	
	<td><select name="id_producto" class="camp" style="width:200px;" required >
	<option></option>
    <?php
    
    while ($rowt = mysqli_fetch_assoc($tequi))
    {
    ?>	
		<option value="<?=$rowt['id']?>"><?=$rowt['id']?></option>
	<?php
    }
    ?>	           
	</select></td>
</tr>
<tr>
<td><font color="#000">Cantidad:</font></td>
<td><input type="number" class="camp" id="cantidad" name="cantidad" style="width:200px;" autocomplete="off" required /></td>
</tr>

</table>
<input type="hidden" class="camp" id="fecha_venta" name="fecha_venta" value="<?php echo $fechacrea;?>" style="width:200px;" readonly />

<br>
<input class="md-triggertt" type="submit" value="GUARDAR" id="btn_inicia"/>	
</form>
	</div>
</div>

	</body>
</html>
