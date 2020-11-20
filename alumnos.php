<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>CRUD</title>
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
	border:2px #000099 none;
  


}

table .sin{
	border:0;
}





.button1 {
  background-color: ; 
  color: black; 
  border: 2px  #4CAF50;
  cursor: pointer;
  transition-duration: 0.4s;
  
}



.button2 {
  background-color: ; 
  color: black; 
  border:2px  #008CBA;
  cursor: pointer;
  transition-duration: 0.4s;
}



.button3 {
  background-color: ; 
  color: black; 
  border: 2px #f44336;
  cursor: pointer;
  transition-duration: 0.4s;

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
  text-decoration: none;

}

.centrado{
	text-align:Center;
}

</style>
</head>

<body>

<?php
include("ConexionBd.php");

$Conexion=$base->query("SELECT * FROM usuario");

$Registros=$Conexion->fetchAll(PDO::FETCH_OBJ);

if(isset ($_POST['cr'])){
	
	
	$Usuario=$_POST ['Usuario'];
	$Pass=$_POST ['Pass'];
	$idrol=$_POST ['idrol'];
	$sql="INSERT INTO usuario (usuario,Pass,idrol) VALUES (:Usuario, :Pass, :idrol)";
	$resultado=$base->prepare($sql);
	$resultado->execute (array (":Usuario"=>$Usuario, ":Pass"=>$Pass, ":idrol"=>$idrol));
	header ("Location:alumnos.php");
	}
 



?>

<h1> Administración </h1>
   <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
  <table width="50%" border="0" align="center" class="table table-dark">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Usuario</td>
      <td class="primera_fila">Contraseña</td>
      <td class="primera_fila">Id-rol</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   <?php
   foreach ($Registros as $Alumno):?>
		
        
        
        
   	<tr>
   
      <td><?php echo $Alumno->dni?></td>
      <td><?php echo $Alumno->usuario?></td>
      <td><?php echo $Alumno->Pass?></td>
      <td><?php echo $Alumno->idrol?></td>
 
      <td class="button3"><a href="borrar_alumno.php?dni=<?php echo $Alumno->dni?>"> <input type='button' name='del' class="btn btn-danger" value='Borrar'></a>  </td>
      <td class='button2'><a href="editar_alumno.php?dni=<?php echo $Alumno->dni?> & usuario=<?php echo $Alumno->usuario?> & Pass=<?php echo $Alumno->Pass?> & idrol<?php echo $Alumno->idrol?> "><input type='button' name='up' class="btn btn-success"  value='Actualizar'></a></td>
      
    </tr>   
    
    <?php
	endforeach;
	?>
        
	<tr>
	<td></td>

      <td><input type='text' name='Usuario' class="form-control"></td>
      <td><input type='text' name='Pass' class="form-control"></td>
      <td><input type='text' name='idrol' class="form-control"></td>
      <td class='button1'><input type='submit' name='cr' class="btn btn-primary" value='Insertar'></td></tr>    
  </table>
  <a href='../login/salir.php'  class="btn btn-danger" >Cerrar sesion</a>
 </form>
<p>&nbsp;</p>
</body>
</html>