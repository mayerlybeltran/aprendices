<!doctype html>
<html>
<head>
<meta charset"utf8">
 <link rel="stylesheet" type="text/css" href="diseno.css">
</head>
<body background="https://www.miltonochoa.com.co/home/media/k2/items/cache/4739b6c64144f72975550c5e8df1b948_XL.jpg">
<div id="global">
 <div id="cabecera"><center>
 <form action="buscar.php" method="get">
 <h1><i>APRENDICES <br> <input type="text" name="buscar" placeholder="buscar nombre">
          <input type="submit" name="Enviando" value="BUSCAR">
         
</i></h1> </form>
<form action="index.php" method="get">
	<input type="text" name="eliminar" placeholder="eliminar  nombre" >
	<input type="submit" name="Enviando" value="ELIMINAR">
</form>
	<br>	
<form action="actualizar.php" method="post">
		   	<input type="text" name="nombres" placeholder="Nombre"></label> 
			<input type="text" name="apellidos" placeholder="Apellido"> 
			<input type="number" name="documento" placeholder="Documento">
			<input type="submit" name="enviando" value="ACTUALIZAR">
			

		</form>

<br><br>
<form action="PDO.php" method="post">
		   	<input type="text" name="nombres" placeholder="Nombre"></label> 
			<input type="text" name="apellidos" placeholder="Apellido"> 
			<input type="number" name="documento" placeholder="Documento">
			<input type="submit" name="enviando" value="INSERTAR">
			

		</form>
		</center>
 </div>
 <?php
     $nombre=$_GET['eliminar'];
 $nombres=$_POST['nombres'];
 $apellidos=$_POST['apellidos'];
 $documento=$_POST['documento'];
	try{

			$base=new PDO('mysql:host=sql5.freemysqlhosting.net; dbname=sql5124996', 'sql5124996','c2d2UyxQzL');
			$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");
		   }catch (Exception $e){

			die ('Error:' . $e->GetMessage());
		}
	  


		$sql="UPDATE aprendices SET nombres=?,apellidos=? WHERE documento=?";
		  $datos=$base->prepare($sql);
       $datos->execute(array($_POST['nombres'],$_POST['apellidos'],$_POST['documento']));


 $sql="SELECT * FROM aprendices";
       $datos=$base->prepare($sql);
       $datos->execute();



while ($registros=$datos->fetch(PDO::FETCH_ASSOC)) {
	
echo "<center>";
	echo "Documento: ".$registros['documento']. "<br>";
	echo "Nombre: ".$registros['nombres']."<br>";
	echo "Apellido: ".$registros['apellidos'];"<br>";
	echo "<hr>";
}
	$datos->closeCursor();
?>
</div>

</body>
</html>