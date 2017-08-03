<?php
class datos extends mysqli {
	public function ejecutarsql($consulta) {
		parent::__construct ( "127.0.0.1", "root", "asde71.4", "usuarios" );
		parent::query ( "SET NAMES 'utf8'" );
		$retorno = parent::query ( $consulta );
		parent::close ();
		return $retorno;
	}
	public function resultadoconsulta($sql) {
		$resultado = self::ejecutarsql ( $sql );
		$matriz = array ();
		while ( $registro = mysqli_fetch_array ( $resultado, MYSQLI_ASSOC ) ) {
			$matriz [] = $registro;
		}
		return $matriz;
	}
	public function validarconexion() {
		$sql = "SELECT '\n<br> Testeada la conexión a datos y es exitosa\n<br>' AS _msg FROM DUAL";
		$resultado = self::ejecutarsql ( $sql );
		$fila = $resultado->fetch_assoc ();
		echo $fila ['_msg'];
	}
}
class modelousuario extends datos {
	public $usuario;
	public function consultar($id=0) {
		if ($id == 0) {
			return parent::resultadoconsulta ( "
				SELECT
					usuario as 'Usuario',
					clave	as 'Clave',
					rol		as 'Rol'
				FROM
					usuario;
			" );
		} else {
			return parent::resultadoconsulta ( "
				SELECT * 
					FROM usuario
					WHERE idusuario=$id
			");
		}
	}
	public function acceder($usuario) {
		
		$resultado = parent::ejecutarsql ( "SELECT * FROM usuario WHERE usuario='{$usuario['usuario']}' AND clave=MD5('{$usuario['clave']}')" );
		$this->usuario = $resultado->fetch_array ( MYSQLI_ASSOC );
		$this->usuario ['existe'] = $resultado->num_rows;
		return $this->usuario;
	}
	public function consultarporid($idusuario) {
		$resultado = parent::ejecutarsql ( "SELECT * FROM usuario where idusuario=$idusuario" );
		$this->usuario = $resultado->fetch_array ( MYSQLI_ASSOC );
		return $this->usuario;
	}
	public function eliminar($idusuario) {
		parent::ejecutarsql ( "DELETE FROM usuario WHERE idusuario='$idusuario'" );
	}
	public function guardar($usuario) {
		$sql = "INSERT INTO usuario(
					usuario,
					clave,
					idpersona,
					rol
				)
				VALUES(
					'{$usuario['usuario']}',
					MD5('{$usuario['clave']}'),
					'{$usuario['idpersona']}',
					'{$usuario['rol']}'
				)";
		echo"<br>La Consulta de guardar usuario es:$sql<br>";
		parent::ejecutarsql ( $sql );
	}
	public function modificar($usuario) {
		parent::ejecutarsql ( "UPDATE usuario SET usuario='{$usuario['usuario']}',clave='{$usuario['clave']}' WHERE idusuario={$usuario['idusuario']}" );
	}
	public function listar() {
		return parent::resultadoconsulta ( "SELECT * FROM usuario" );
		;
	}
	public function idmenor() {
		$resultado = parent::ejecutarsql ( "SELECT MIN(idusuario) AS id from usuario" );
		$id = $resultado->fetch_array ( MYSQLI_ASSOC );
		return $id ['id'];
	}
	public function buscar($text) {
		$busqueda = parent::ejecutarsql ( "SELECT * FROM usuario WHERE usuario LIKE '%$text%'" );
		return $busqueda->fetch_array ( MYSQLI_ASSOC );
	}
}
class modelopersona extends datos {
	public function guardar($usuario) {
		$sql = "
				INSERT INTO 
					persona(
						primernombre,segundonombre,primerapellido,
						segundoapellido,identificacion,tipodeidentificacion,
						correo,telefono,domicilio
					)
					VALUES(
						'{$usuario['primernombre']}'	,'{$usuario['segundonombre']}',
						'{$usuario['primerapellido']}'	,'{$usuario['segundopellido']}',
						'{$usuario['identificacion']}'	,'{$usuario['tipodeidentificacion']}',
						'{$usuario['correo']}'			,'{$usuario['telefono']}',
						'{$usuario['domicilio']}'
					)
			";
		echo $sql;
		parent::ejecutarsql($sql);
	}
	public function buscar($text) {
		$busqueda = parent::ejecutarsql ( "SELECT * FROM persona WHERE persona LIKE '%$text%'" );
		return $busqueda->fetch_array ( MYSQLI_ASSOC );
	}
	public function consultar($id = 0) {
		if ($id == 0) {return parent::resultadoconsulta ("SELECT * FROM persona");}
		else {return parent::resultadoconsulta("SELECT * FROM persona WHERE idpersona=$id");}
	}
	public function eliminar($id = 0) {
		$sql="DELETE FROM persona WHERE identificacion=$id";
		echo $sql;
		parent::resultadoconsulta ($sql);
	}
	public function consultarporcedula($humano){
		$resultado= parent::resultadoconsulta ("SELECT * FROM persona where identificacion={$humano['identificacion']}");
		echo "<br>El resultado de la consulta por cedula es:<br>$resultado<br>";
		return $resultado;
	}
}
class modelohumano extends datos {
	public function consultar($id = 0) {
		if ($id == 0) {
			return parent::resultadoconsulta ( "
				SELECT 			
					usuario					as 'Usuario',
					clave 					as 'Contraseña', 
					rol						as 'Rol', 
					primernombre 			as 'Nombre',
					primerapellido 			as 'Apellido',
					identificacion 			as 'Identificación',
					tipodeidentificacion 	as 'Tipo',
					correo 					as 'Correo',
					telefono 				as 'Telefono móvil'
				FROM usuario
				INNER JOIN persona
				ON usuario.idpersona=persona.idpersona	
			" );
		} else {
			return parent::resultadoconsulta ( "
				SELECT * FROM usuario
				INNER JOIN persona
				ON usuario.idpersona=persona.idpersona
				WHERE persona.idpersona=$id
			" );
		}
	}
	public function consultarcedula($id = 0) {
		return parent::resultadoconsulta ( "
			SELECT * FROM usuario
			INNER JOIN persona
			ON usuario.idpersona=persona.idpersona
			WHERE persona.identificacion={$id['identificacion']}
		" );
		
	}
}
?>