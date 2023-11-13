<?php
	require_once("./class/dao.dados.php");

	$dao = DaoDados::getInstance()->Buscar($_POST['hash']);

if($dao):
	echo "A string correspondente é: " . $dao['string']; 
else:
	echo 'Dados não encontrada!';
endif;