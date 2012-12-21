<?php  
	session_start();
	include 'conn.php';
	include 'aut.php';
	
	$sal = '282828282828181823uiasdhaskjdasjkdhasjd1289181283213jiasdhiuqdhqiw9828218312831231hijsfkjfkjgfjsdk';
	
	if(isset($_POST['login'])){
		
		$login = addslashes($_POST['login']);
		$_SESSION['nameC'] = $_POST['login'];
	}
	else{
		$_SESSION['erro'] = '<div id="erro">Parece haver um erro com o login</div>';
		header('Location:index.php');
		exit();
	}
	
	
	if(isset($_POST['senha'])){
	
		$senha = $_POST['senha'];
		$_SESSION['keyC'] = $_POST['senha'];
	}
	else{
		$_SESSION['erro'] = '<div id="erro">Parece haver um erro com a sua senha</div>';
		header('Location:index.php');
		exit();
	}
	
	
	
	if(strlen($login) < 8){
		
		$_SESSION['erro'] = '<div id="erro">Seu login deve conter ao menos 8 caracteres</div>';
		header('Location:index.php');
		exit();
	}
	if(strlen($senha) < 10){
		
		$_SESSION['erro'] = '<div id="erro">Sua senha deve conter ao menos 8 caracteres</div>';
		header('Location:index.php');
		exit();
	}
	else{
		$senha = $senha.$sal;
	}
	
	//Insere no banco
	
	$query = mysql_query("INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')");
	
	if($query == false){
		$_SESSION['erro'] = '<div id="erro">Usuario indisponivel, ja cadastrado na base de dados, tente outro nome</div>';
		header("Location:index.php");
		exit();
	}
	
	
	//fecha conexao
	mysql_close($conexao);
	
	$_SESSION['erro'] = '<div id="erro">Efetue login com o cadastro feito anteriormente</div>';
	if(isset($_SESSION['nameC'])){
	
		unset($_SESSION['nameC']);
	}
	
	if(isset($_SESSION['keyC'])){
	
		unset($_SESSION['keyC']);
	}
	header('Location:index.php');
	exit();

?>







