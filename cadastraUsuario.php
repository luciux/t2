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
		$_SESSION['erro'] = 'Parece haver um erro com o login';
		header('Location:index.php');
		exit();
	}
	
	
	if(isset($_POST['senha'])){
	
		$senha = $_POST['senha'];
		$_SESSION['keyC'] = $_POST['senha'];
	}
	else{
		$_SESSION['erro'] = 'Parece haver um erro com a sua senha';
		header('Location:index.php');
		exit();
	}
	
	
	
	if(strlen($login) < 8){
		
		$_SESSION['erro'] = 'Seu login deve conter ao menos 8 caracteres';
		header('Location:index.php');
		exit();
	}
	if(strlen($senha) < 10){
		
		$_SESSION['erro'] = 'Sua senha deve conter ao menos 8 caracteres';
		header('Location:index.php');
		exit();
	}
	else{
		$senha = $senha.$sal;
	}
	
	//Insere no banco
	
	$query = mysql_query("INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')");
	if($query == false){
		
		$_SESSION['erro'] = 'Usuario indisponivel, ja cadastrado na base de dados, tente outro nome';
		header("Location:index.php");
		exit();
		
	}
	mysql_close($conexao);
	
	$_SESSION['erro'] = 'Efetue login com o cadastro feito anteriormente';
	if(isset($_SESSION['nameC'])){
	
		unset($_SESSION['nameC']);
	}
	
	if(isset($_SESSION['keyC'])){
	
		unset($_SESSION['keyC']);
	}
	header('Location:index.php');
	exit();

?>







