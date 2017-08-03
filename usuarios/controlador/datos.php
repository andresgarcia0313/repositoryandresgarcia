<?php 
//preparación de ajax para rellenar formulario con php
require_once 'controlador.php';
require_once '../modelo/modelo.php';
$humano=new controladorhumano();
$datos=$humano->consultar($_GET['id']);	
		echo '
		<script>
			function cambiardatos() {
				document.getElementById("primernombre").innerHTML = "'.$datos[0]['primernombre'].'";
			}
		</script>';
?>