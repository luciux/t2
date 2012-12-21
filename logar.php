<?php
	
	session_start();
	include 'conn.php';
	
	$sal = '282828282828181823uiasdhaskjdasjkdhasjd1289181283213jiasdhiuqdhqiw9828218312831231hijsfkjfkjgfjsdk';//adicional de seguranca
	//catando campos da tela de login
	
	
	$login = addslashes($_POST['login']);
	$senha = $_POST['senha'].$sal;
	
	$_SESSION['nameL'] = $login;
	$_SESSION['keyL'] = $_POST['senha'];
		
	//Checando o usuário e senha..
	$query = ("SELECT senha FROM usuarios WHERE login='$login'");//Seleciona da tabela usuario...
	$resultado = mysql_query($query);//obtém resultado do banco
	
	
	if(Mysql_num_rows($resultado) == 0){
		$_SESSION['erro'] = '<div id="erro">Usuário não presente na base de dados</div>';
		header('Location:index.php');
		exit();
		
	}
	
	$senhaValida = mysql_fetch_array($resultado);//coloca em um array o resultado sendo que a senha é unica e estara na pos[0]
	
	
	if($senhaValida[0] == $senha){
		//echo 'Loooogou rafa booom!';
		$_SESSION['logado'] = true;
		header('Location:musicsys.php');
		exit();
	}
	
	else{
		//echo 'Usuário não cadastrado!';
		$_SESSION['erro'] = '<div id="erro">Senha inválida</div>';
		header('Location:index.php');
		exit();
	}
		
?>