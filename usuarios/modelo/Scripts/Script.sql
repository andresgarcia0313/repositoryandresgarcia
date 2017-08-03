USE usuarios;
DESCRIBE persona;
SELECT idpersona, primernombre, segundonombre, primerapellido, segundoapellido, tipodeidentificacion, identificacion, domicilio, correo, telefono
FROM usuarios.persona;
DELETE FROM  usuarios.persona
WHERE idpersona=10;
SELECT idusuario, usuario, clave, persona_idpersona
FROM usuarios.usuario;
SELECT idpersona, primernombre , segundonombre, primerapellido, segundoapellido, tipodeidentificacion, identificacion, domicilio, correo, telefono
FROM usuarios.persona;
describe usuarios.persona;
ALTER TABLE usuarios.usuario ADD rol varchar(50) NULL ;
SELECT usuario as 'Usuario',clave as 'Clave', rol	as 'Rol' FROM usuario;
SELECT * FROM usuario;
SELECT * FROM persona;
SELECT 			
	usuario, 
	rol, 
	primernombre 			as 'Primer Nombre',
	primerapellido 			as 'Primer Nombre',
	identificacion 			as 'Identificación',
	tipodeidentificacion 	as 'Tipo De Identificación',
	correo 					as 'Correo Electronico',
	telefono 				as 'Telefono'
FROM usuario
INNER JOIN persona
ON usuario.idpersona=persona.idpersona	
SELECT * FROM usuario INNER JOIN persona ON usuario.idpersona=persona.idpersona WHERE persona.idpersona=1;