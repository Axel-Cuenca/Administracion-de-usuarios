<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar usuario</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>

h1{text-align:Center; 

font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  
  

}




body{
	background:Linear-gradient(-45deg,#ee7752,#e73c7e,#23a6d5,#23d5ab);
	background-size: 400% 400%;
	position:relative;
	animation:change 10s ease-in-out infinite
}

@keyframes change {
        0%{
            background-position:0 50%;
		}
		
		50%{
			background-position:100% 50%;
		}
		100%{
			background-position:0 50%;
		}
}

table td{
	text-align:center;
	border:1px #000099 dotted;

}

table .sin{
	border:0;
}


.button2 {
  background-color: ; 
  color: black; 
  border:2px  #008CBA;
  cursor: pointer;
  transition-duration: 0.4s;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}


/*table .bot{
	padding:0 10px;
	display:inline;
	border:0;
}*/

table .primera_fila{
	font-size:1.5em;
	text-decoration:underline;
	background-color:;
}

.centrado{
	text-align:Center;
}

</style>



</style>
<body>

<h1>ACTUALIZAR</h1>


<?php

include ("ConexionBd.php");

if(!isset ($_POST ["bot_actualizar"])){

$dni= $_GET ["dni"];
$usuario= $_GET ["usuario"];
$Pass= $_GET ["Pass"];
$idrol= $_GET ["idrol"];


}else{
	$dni= $_POST ["dni"];
  $usuario= $_POST ["usuario"];
  $Pass= $_POST ["Pass"];
  $idrol= $_POST ["idrol"];
	
	$sql="UPDATE usuario SET dni=:dni,usuario=:usuario, Pass=:Pass,idrol=:idrol WHERE dni=:dni";
	
	$resultado=$base->prepare($sql);
	
	$resultado->execute(array(":dni"=>$dni,":usuario"=>$usuario, ":Pass"=>$Pass, ":idrol"=>$idrol));
	
	header("Location:alumnos.php");
}
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER ['PHP_SELF']; ?>">
  <table width="25%" border="0" align="center" class="table table-dark">
    <tr>
      <td></td>
      <td><label for="Id"></label>
      <input type="hidden" name="dni" id="dni" value="<?php echo $dni ?>"></td>
    </tr>
    
    <tr>
      <td>Usuario</td>
      <td><label for="usuario"></label>
      <input type="text" name="usuario" id="usuario"value="<?php echo $usuario ?>"></td>
    </tr>
    
    <tr>
      <td>Contraseña</td>
      <td><label for="Contraseña"></label>
      <input type="text" name="Pass" id="Pass"value="<?php echo $Pass ?>"></td>
    </tr>
    <tr>
      <td>Id-Rol</td>
      <td><label for="idrol"></label>
      <input type="text" name="idrol" id="idrol"value="<?php echo $idrol ?>"></td>
    </tr>
   
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" class="btn btn-primary" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>