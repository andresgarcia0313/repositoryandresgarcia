<?php
header("Content-Type: text/html;charset=utf-8");
require_once 'modelo/modelo.php';
require_once 'controlador/controlador.php';
require_once 'vista/vista.php';
function crearcontroladoryejecutarmetodo(){
	if(isset($_POST['formulario'])){
		$clasecontrolador="controlador".$_POST['formulario'];
		$controlador=new $clasecontrolador();
		$metodo=$_POST['metodo'];
		$controlador->$metodo($_POST);
	}
}
crearcontroladoryejecutarmetodo();
$objetopagina = new web ();
$objetopersona = new modelopersona();
$objetohumano = new modelohumano();
$objetopagina->agregarcontenidos('formulariousuario2.php');
$objetopagina->agregarcontenidos('tablahumanos.php');
//$objetopagina->agregarcontenidos('tablausuarios.php');
//$objetopagina->agregarcontenidos('tablapersonas.php');
$objetopagina->mostrarweb();
?>