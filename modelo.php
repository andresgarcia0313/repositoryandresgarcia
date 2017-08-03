<?php

class datos extends mysqli {

        public function ejecutarsql($consulta) {
        //Metodo que conecta y ejecuta una consulta sql y devuelve un array tipo mysql
        //parent::__construct("sql308.0fees.us", "0fe_15924545", "asde71.4", "0fe_15924545_manual");
        parent::__construct("db4free.net", "usuario", "usuario", "basededatos", 3307);
        parent::query("SET NAMES 'utf8'");
        $retorno = parent::query($consulta);
        parent::close();
        return $retorno;
    }

    public function resultadoconsulta($sql) {
        //ejecuta sql y retorna un array tipo php
        $resultado = self::ejecutarsql($sql);
        $matriz = array();
        while ($registro = mysqli_fetch_array($resultado, MYSQLI_BOTH)) {
            $matriz [] = $registro;
        }
        return $matriz;
    }

    public function validarconexion() {
        //valida funcionamniento de la base de datos
        $sql = "SELECT '\n<br> Testeada la conexión a datos y es exitosa\n<br>' AS columna FROM DUAL";
        $resultado = self::ejecutarsql($sql);
        $fila = $resultado->fetch_assoc();
        echo $fila ['columna'];
    }

}

class modelogenerica extends datos {

    private $matrizatributos; // me almacenara un o más registros con sus atributos 

    function getMatrizatributos() {
        return $this->matrizatributos;
    }

    function setMatrizatributos($matrizatributos) {
        $this->matrizatributos = $matrizatributos;
    }

    public function leer($atributo = null, $valor = null) {
        if ($atributo == null AND $valor == null) {
            $this->matrizatributos = parent::resultadoconsulta(
                            "SELECT * FROM " . get_class($this)
            );
        } else {
            $this->matrizatributos = parent::resultadoconsulta(
                            "SELECT * FROM " . get_class($this) . " WHERE $atributo='$valor'"
            );
        }
        if (count($this->matrizatributos) == 1) {
            $this->matrizatributos = $this->matrizatributos[0];
        }
        return $this->matrizatributos;
    }

    public function eliminar($atributo = null, $valor = null) {
        $this->matrizatributos = parent::resultadoconsulta("DELETE FROM " . get_class($this) . " WHERE $atributo='$valor'");
    }

    public function actualizar() {
        
    }

    public function crear($datos) {
        $campos = parent::resultadoconsulta("DESCRIBE " . get_class($this));
        for ($i = 0; $i <= (count($campos)); $i++) {

            if ($i == 0 OR $i == (count($campos))) {
                $columns = $columns . $campos[$i]['Field'];
            } else {
                $columns = $columns . ',' . $campos[$i]['Field'];
            }
        }
        echo "<br>Estos son los datos<br>";
        var_dump($datos);
        //echo "<br>\nINSERT INTO" . " " . get_class($this) . " " . "($columns)VALUES (value1, value2, value3.)";
        for ($i = 0; $i <= (count($datos)); $i++) {
            if ($i == 0 OR $i == (count($datos))) {
                $values = $values . $datos[$i];
            } else { 
                $values = $values . ',' . $datos[$i];
            }
        }
        /*
         * Crear con fetch_array el recorido de datos 
        while(){
            
        }*/
        echo "\n<br>$values<br>";

        //detectar nombre de tabla
        //detectar nombre de columnas
        //aquí debe construir la consulta insert into con values enumerados sin incluir el id
        //falta contar los elemento$matrizatributoss del array de entrada
        //$this->matrizatributos=parent::resultadoconsulta("INSERT INTO ". get_class($this). " WHERE $atributo='$valor'");
    }

}

class empresa extends modelogenerica {
    
}

class formularios extends modelogenerica {
    
}

class manual extends modelogenerica {
    
}

class pagina extends modelogenerica {
    
}

class capitulos extends modelogenerica {
    
}

echo "modelo.php ejecutado<br>\n";
/*$objpag1 = new pagina();
$registro=$objpag1->leer("id","1");
print_r($registro);
//print_r( $objpag->resultadoconsulta("select *from information_schema.key_column_usage where constraint_name!='Primary' and constraint_schema!='mysql' and constraint_schema='0fe_15924545_manual'"));
*/