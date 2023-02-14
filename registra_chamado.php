<?php 

	session_start();

	//Formatando as strings
	$_POST['titulo'] = str_replace('#','-',$_POST['titulo']);
	$_POST['categoria'] = str_replace('#','-',$_POST['categoria']);
	$_POST['descricao'] = str_replace('#','-',$_POST['descricao']);

	//Juntando as strings com a funcao implode;
	$texto = $_SESSION['id']. '#' . implode('#',$_POST) . PHP_EOL;

	//Abrindo/criando o arquivo
	$arquivo = fopen('arquivo.hd', 'a');
	//Escrevendo no arquivo
	fwrite($arquivo, $texto);
	//Fechando o arquivo
	fclose($arquivo);

	header('Location: abrir_chamado.php');

?>