<!DOCTYPE html>
<html>
<head>
	<meta charset"utf8">
 <link rel="stylesheet" type="text/css" href="diseno.css">

</head>
<body  background="https://www.miltonochoa.com.co/home/media/k2/items/cache/4739b6c64144f72975550c5e8df1b948_XL.jpg">
<div id="global">
 <div id="cabecera"><center>
 <h1><i>APRENDICES </i></h1>
</center>
 </div>
 <center>
<?php
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
	  
    
 
   $sql= "INSERT INTO aprendices (documento,nombres,apellidos) VALUES (:docu,:nomb,:apell)";
		  $datos=$base->prepare($sql);
        $datos->execute(array(':docu'=>$documento,':nomb'=> $nombres,':apell'=> $apellidos)); 

 $sql="SELECT * FROM aprendices";
       $datos=$base->prepare($sql);
       $datos->execute();



while ($registros=$datos->fetch(PDO::FETCH_ASSOC)) {
	

	echo "Documento: ".$registros['documento']. "<br>";
	echo "Nombre: ".$registros['nombres']."<br>";
	echo "Apellido: ".$registros['apellidos'];"<br>";
	echo "<hr>";
}
	$datos->closeCursor();
?>
</center></div>
</body>
</html>