<?php

	session_start();

	$usuario_autenticado = false;

	$lista_usuarios = array(
		array('email'=>'adm@teste.com', 'senha'=>'123456'),
		array('email'=>'user@teste.com', 'senha'=>'abcdef')
	);

	foreach($lista_usuarios as $usuario){

		if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
			$usuario_autenticado = true;
		}

	}

	if($usuario_autenticado){
		echo 'Usuario autenticado com sucesso';
		$_SESSION['autenticado'] = 'SIM';
		header('Location: home.php');
	}else {
		$_SESSION['autenticado'] = 'NAO';
		header('Location: index.php?login=erro');
	}

?>
