Persona					BD	Modelo	Controlador	Vista
    idpersona			ok	ok		ok			ok
    primernombre 		
    segundonombre
    primerapellido
    segundoapellido
    identificacion
    correo
    telefono
    __________________
    CRUD()
    C.existe()//indicar por cedula que ya está creado
    validardatos()
contacto
	id
	contacto
tipodecontacto
	id
	tipodecontacto
Tipodedocumento
    idtipodedocumento
    tipodedocumento
Usuario
    idusuario
    usuario
    clave MD5
    idperfil
    idpersona
    __________________
    encriptarclave()
    CRUD()
    acceder()
    listar()
    buscar y listar in(tpdoc,documento,campodocumento)out(tpdoc,ide,nom,ape,@,user,muni,dept)
    buscar(null)(listartodos)
    nomodificar()
    consultarpropiosdatosusuario()
Rol
    idrol
    perfil("Anónimo, Usuario, Registrado, Administrador")
    __________________
    CRUD()
Permisos
    idpermisos
    fkperfil
    fkfuncion
    __________________
    CRUD()
Funciones
    idfuncion
    funcion
Ubicacion
	idubicacion
	domicilio
	fkmunicipio
ciudad
    id
    ciudad
    fkdepartamento
Departamento
    id
    departamento
Información Sobre eclipse y la utilización de repositorios    
https://wiki.eclipse.org/PDT/