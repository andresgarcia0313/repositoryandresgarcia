<?php
$persona = new modelopersona();
$web = new web();
$web->construirtablahtml($persona->consultar());
?>