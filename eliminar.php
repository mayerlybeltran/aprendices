<!DOCTYPE html>
<html>
<head>
<meta charset"utf8">
 <link rel="stylesheet" type="text/css" href="diseno.css">
	<title></title>
</head>
<body background="https://www.miltonochoa.com.co/home/media/k2/items/cache/4739b6c64144f72975550c5e8df1b948_XL.jpg">
<div id="global">
  <div id="cabecera"><center>
 <form action="buscar.php" method="post">
 <h1><i>APRENDICES <br> <input type="text" name="buscar" placeholder="buscar nombre">
          <input type="submit" name="Enviando" value="BUSCAR">
         
</i></h1> </form>
<form action="eliminar.php" method="post">
	<input type="text" name="eliminar" placeholder="eliminar  nombre" >
	<input type="submit" name="Enviando" value="ELIMINAR">
</form>
	<br>	
<form action="index.php" method="post">
REGISTROS 

	<input type="submit" name="Enviando" value="ACTUALIZAR">
</form>
</center>
 </div>
<?php 
$eliminar_registro= $_GET[$eliminar_registro];

	try{

			$base=new PDO('mysql:host=sql5.freemysqlhosting.net; dbname=sql5124996', 'sql5124996','c2d2UyxQzL');
			$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");
		   }catch (Exception $e){

			die ('Error:' . $e->GetMessage());
		}
	  
    
$sql="DELETE nombres,apellidos,documento from aprendices WHERE nombres= ?";
$resultado=$base->prepare($sql);
$resultado->execute(array($eliminar_registro));
while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)) {
	
echo "<center>";
	echo "Documento: ".$registros['documento']. "<br>";
	echo "Nombre: ".$registros['nombres']."<br>";
	echo "Apellido: ".$registros['apellidos'];"<br>";
	echo "<hr>";
}
	$resultado->closeCursor();
?>
</div>
</center>

 
</body>
</html>