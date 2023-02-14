<?php

	session_start();

	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = ['administrativo'=>1,'usuario'=>2];

	$lista_usuarios = array(
		array('id'=>1, 'email'=>'adm@teste.com', 'senha'=>'1234', 'perfil_id'=>1),
		array('id'=>2, 'email'=>'user@teste.com', 'senha'=>'1234', 'perfil_id'=>1),
		array('id'=>3, 'email'=>'jose@teste.com', 'senha'=>'1234', 'perfil_id'=>2),
		array('id'=>4, 'email'=>'maria@teste.com', 'senha'=>'1234', 'perfil_id'=>2)
	);

	foreach($lista_usuarios as $usuario){

		if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
			$usuario_autenticado = true;
			$usuario_id = $usuario['id'];
			$usuario_perfil_id = $usuario['perfil_id'];
		}

	}

	if($usuario_autenticado){
		echo 'Usuario autenticado com sucesso';
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	}else {
		$_SESSION['autenticado'] = 'NAO';
		header('Location: index.php?login=erro');
	}

?>
