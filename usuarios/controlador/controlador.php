<?php
class controladorhumano {
	public $humano;
	public $modelousuario;
	public $modelopersona;
	public $modelohumano;
	public function __construct() {
		$this->modelousuario = new modelousuario ();
		$this->modelopersona = new modelopersona ();
		$this->modelohumano = new modelohumano ();
	}
	public function guardar($humano) {
		echo "<br>Entro a guardar controlador humano<br>";
		print_r($humano);
		if (isset ( $humano ['id'] )) {
			//echo "<br>Entro a actualizar humano controlador<br>";
			$this->modelopersona->guardar ( $humano );
			$this->modelousuario->guardar ( $humano );
		} else {
			//echo "<br>Entro a crear humano controlador<br>";
			$this->modelopersona->guardar ($humano);
			$human=$this->modelopersona->consultarporcedula($humano);
			//echo "<br>La Persona Guardada es:<br>";
			$humano['idpersona']=$human[0]['idpersona'];
			//print_r($humano);
			$this->modelousuario->guardar($humano);
		}
	}
	public function consultar($id = 0) {
		return $this->modelohumano->consultar ( $id );
	}
	public function consultarcedula($id = 0) {
		//echo "<br>Entro a controlador humano consultar cedula<br>";
		//print_r($id);
		//echo "<br>Entro a controlador humano consultar cedula<br>";
		$_SESSION=$this->modelohumano->consultarcedula($id['identificacion']);
	}
}
class controladorusuario {
	public $usuario;
	public $modelousuario;
	public $modelopersona;
	public $modelohumano;
	public function __construct() {
		$this->modelousuario = new modelousuario ();
		$this->modelopersona = new modelopersona ();
		$this->modelohumano = new modelohumano ();
	}
	public function acceder($usuario) {
		$datosusuario = $this->modelousuario->acceder($usuario);
		if (1 == $datosusuario ['existe']) {
			session_start ();
			$_SESSION = $usuario;
		}
	}
	public function salir() {
		session_unset ();
	}
}
class controladorpersona{
	public $modelopersona;
	public function __construct() {
		$this->modelopersona = new modelopersona ();
	}
	public function eliminar($id){
		echo "Entro AL Eliminar";
		$this->modelopersona->eliminar($id['identificacion']);
	}
	
}
?>