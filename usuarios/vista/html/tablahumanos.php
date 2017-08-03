<?php
	$humano = new modelohumano();
	$web = new web();
	$web->construirtablahtml($humano->consultar());
?>