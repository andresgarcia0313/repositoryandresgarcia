<?php
$usuario = new modelousuario();
$web = new web();
$web->construirtablahtml($usuario->consultar());
?>