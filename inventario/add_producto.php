<script src="sweet/sweetalert.min.js"></script>
<body bgcolor="#131313" style="color:#131313;font-family: sans-serif;">
<?php
include "conex_bd.php";

$nombre_producto=$_POST['nombre_producto'];
$referencia=$_POST['referencia'];
$precio=$_POST['precio'];
$peso=$_POST['peso'];
$categoria=$_POST['categoria'];
$stock=$_POST['stock'];
$fecha_creacion=$_POST['fecha_creacion'];

	
   {
       $sql="INSERT INTO productos(nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion) 
	   VALUES ('$nombre_producto','$referencia','$precio','$peso','$categoria','$stock','$fecha_creacion')";
       $res=mysqli_query($cn,$sql);
	   
	   
       if($res){
		   
		   echo"<script type='text/javascript'>			
	
	swal({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Producto agregado correctamente!'
            }).then(function() {
                window.location = 'index.php';
            });
		
        </script>";
       
        }else{
            echo"<script type='text/javascript'>			
	
	swal({
		icon:  'error',
        title: 'Error!',
        text:  'Ocurrió un error, por favor intente nuevamente'
            }).then(function() {
                window.location = 'index.php';
            });
		
        </script>";
        }

    }
	
?>
</body>