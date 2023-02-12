<?php

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
	}else {
		header('Location: index.php?login=erro');
	}

?>
