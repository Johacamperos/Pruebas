<script src="sweet/sweetalert.min.js"></script>
<body bgcolor="#131313" style="color:#131313;font-family: sans-serif;">
<?php
include "conex_bd.php";

$id = $_GET['id'];

$query = "DELETE FROM productos where id = '".$id."'"; 
$resultado = mysqli_query($cn,$query);
		
if($resultado){

	 echo"<script type='text/javascript'>			
	
	swal({
		icon:  'success',
        title: 'Perfecto!',
        text:  'El producto ha sido eliminado'
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