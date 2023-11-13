<?php
	$string = $_POST['string'];

	require_once("./class/dao.dados.php");

	$dados = new Dados();

	$dados->setString($string);
	$dados->setHashmd5(md5($string));
	$dados->setHashsha512(hash('sha512', $string));

	$dao = DaoDados::getInstance()->Insert($dados);

	if($dao):
		echo "Dados cadastrada com sucesso";
	else:
		echo "Não foi possível cadastrar os dados, tente novamente mais tarde";
	endif;