<script src="sweet/sweetalert.min.js"></script>
<body bgcolor="#131313" style="color:#131313;font-family: sans-serif;">
<?php 
include "conex_bd.php";

$id               = $_POST['id'];
$nombre_producto  = $_POST['nombre_producto'];
$referencia       = $_POST['referencia'];
$precio  	      = $_POST['precio'];
$peso  	          = $_POST['peso'];
$categoria  	  = $_POST['categoria'];
$stock 	          = $_POST['stock'];
$fecha_creacion   = $_POST['fecha_creacion'];


$sql1=("UPDATE productos SET nombre_producto='".$nombre_producto."',referencia='".$referencia."',precio='".$precio."',peso='".$peso."',categoria='".$categoria."',stock='".$stock."',fecha_creacion='".$fecha_creacion."' WHERE id='$id'");
$resultado = mysqli_query($cn,$sql1);
	  

if($resultado){

	 echo"<script type='text/javascript'>			
	
	swal({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Datos Actualizados Exitosamante!'
            }).then(function() {
                window.location = 'index.php';
            });
		
        </script>";	
}else{
    echo"<script type='text/javascript'>			
	
	swal({
		icon:  'error',
        title: 'Oops!',
        text:  'Ocurrió un error, por favor intente nuevamente'
            }).then(function() {
                window.location = 'index.php';
            });
		
        </script>";
}


?>
</body>