<?php 
class web{
	public $html;
	public $contenido;
	public function __construct(){
		$this->html['encabezado']='
<!DOCTYPE html>
<html lang="es">
	<head>
	   	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	   	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<meta http-equiv="refresh" content="1">-->
	   	<title>Gestor De Usuarios</title>
		<link rel="shortcut icon" type="image/png" href="http://damefans.com/theme/coffee/images/users.png"/>
	   	<link href="vista/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	   	<!--[if lt IE 9]>
	   	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	   	<![endif]-->
	</head>
	<body>
';
		$this->html['piedepagina']='
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vista/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
		';
	}
	public function mostrarweb(){
		echo $this->html['encabezado'];
		require_once 'html/menu.php';
		require_once 'html/presentacionencabezado.php';
		echo '		<div class="container">
			<div class="jumbotron" style="background-color: rgb(246, 246, 246);">
';
		$cantidad=count($this->contenido);
		for($i=0;$i<$cantidad;$i++){
			require_once "html/".$this ->contenido[$i];
		}
		echo '
			</div>
		</div>';
		echo $this->html['piedepagina'];
	}	
	public function agregarcontenidos($contenido){
		$this->contenido[]=$contenido;
	}
	public function construirtablahtml($arrayphp){
		echo"\n\t\t\t\t<table class='table table-striped table-hover'>";
		$fila=0;
		foreach($arrayphp as $linea) {
			echo "\n\t\t\t\t\t<thead>\n\t\t\t\t\t\t<tr>";
			foreach($linea as $linea=>$valor)if($fila==0){echo "\n\t\t\t\t\t<th>".$linea."</th>";}
			echo "\n\t\t\t\t\t\t</tr>\n\t\t\t\t\t</thead>";
			$fila++;
		}
		foreach($arrayphp as $linea) {
			echo "\n\t\t\t\t\t<tr>";
			foreach($linea as $linea=>$valor){echo "\n\t\t\t\t\t\t<td>".$valor."</td>";}
			echo "\n\t\t\t\t\t</tr>";
		}echo "\n\t\t\t\t</table>";
	}
}
?>