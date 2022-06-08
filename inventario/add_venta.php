<script src="sweet/sweetalert.min.js"></script>
<body bgcolor="#131313" style="color:#131313;font-family: sans-serif;">
<?php
include "conex_bd.php";

$id_producto=$_POST['id_producto'];
$cantidad=$_POST['cantidad'];
$fecha_venta=$_POST['fecha_venta'];
	
  
	   $productos=mysqli_query($cn,"SELECT * FROM `productos` WHERE id='$id_producto' ");
	   $datos = mysqli_fetch_assoc($productos);
	
	   $stockactual=$datos['stock'];
	   
	   $resta=$stockactual-$cantidad;
  
     if ($stockactual<$cantidad){
		 
		 echo"<script type='text/javascript'>			
	
	 swal({
		icon:  'error',
        title: 'Error!',
        text:  'El producto no cuenta con cantidad suficiente en stock'
            }).then(function() {
                window.location = 'index.php';
            });
		
        </script>"; 
		 
	 }else{
  
       $sql="INSERT INTO ventas(id_producto,cantidad,fecha_venta) 
	   VALUES ('$id_producto','$cantidad','$fecha_venta')";
       $res=mysqli_query($cn,$sql);
	  
	   
	   $sql1=("UPDATE productos SET stock='".$resta."' WHERE id='$id_producto'");
       $resultado = mysqli_query($cn,$sql1);

	   
       if($res){
		   
		   echo"<script type='text/javascript'>			
	
	swal({
		icon:  'success',
        title: 'Perfecto!',
        text:  'Venta registrada correctamente!'
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