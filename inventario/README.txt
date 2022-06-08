1 Iniciar el Xampp
2 La base de datos se encuentra en una carpeta llamada BD
La base de datos se llama inventarios, cambiar la contraseña y usuario del archivo conex_bd según la configuración tengan en su servidor
3 Teniendo listo eso pueden correr la prueba


Cconsultas Mysql 
(pueden ver las consultas funcionando tambien en la prueba)
Producto más vendido
Consulta: SELECT ventas.id_producto,productos.id,productos.nombre_producto, SUM(ventas.cantidad) AS masvendido FROM ventas,productos WHERE ventas.id_producto=productos.id GROUP BY ventas.id_producto ORDER BY SUM(ventas.cantidad) DESC LIMIT 1;

Producto con mas STOCK
Consulta: SELECT productos.stock,productos.nombre_producto,productos.id, SUM(productos.stock) AS masstock FROM productos GROUP BY productos.id ORDER BY SUM(productos.stock) DESC LIMIT 1;