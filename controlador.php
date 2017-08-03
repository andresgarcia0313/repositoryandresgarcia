<?php
require_once 'modelo.php';
$datos=$_POST;
class Controladorpagina{
    private $pag;
    function __construct() {
        $this->pag=new pagina;
    }
    public function crear($datos){
        $this->pag->crear($datos);
    }
}
echo "Comienza<br>";
print_r($datos);
$objconpagina=new Controladorpagina();
$objconpagina->crear($datos);