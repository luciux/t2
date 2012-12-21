<?php 
	session_start();
	require_once 'functions.php';
	topo('L-W-I-G');
	//Layout --------------------------------------
	
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){ // testa, se ja esta logado no ambiente, caso estiver redireciona para a pagina das pesquisas
	
		header('Location:musicsys.php');
		exit();
	}
	
	if(isset($_SESSION['erro'])){
		
		echo '<p>'.$_SESSION['erro'].' </p>';
		unset($_SESSION['erro']);
	}
	
	echo'<div id="topo"><img src="img/logo.png" /></div>';
	echo'<div id="boxHome">';
		
		
	echo'<div id="boxSignup">';
		echo '<form method="post" action="logar.php">';
			echo '<p>Login:<input type="text" name="login" value="'.@$_SESSION['nameL'].'"/> </p>';
			echo '<p>Senha:<input type="password" name="senha" value="'.@$_SESSION['keyL'].'"/> </p>';
			echo '<input type="submit" name="logar" value="Logar" />';
		echo '</form>';
	echo'</div>';
		
	echo'<div id="boxLogin">';
		echo '<form method="post" action="cadastraUsuario.php">';
			echo '<p>Login:<input type="text" name="login" value="'.@$_SESSION['nameC'].'" /></p>';
			echo '<p>Senha:<input type="password" name="senha" value="'.@$_SESSION['keyC'].'" /></p>';
			echo '<input type="submit" name="Cadastrar" value="Cadastrar" />';
		echo '</form>';
	echo'</div>';
	
	echo'</div>';
	
	if(isset($_SESSION['nameL'])){
	
		unset($_SESSION['nameL']);
	}
	
	if(isset($_SESSION['keyL'])){
	
		unset($_SESSION['keyL']);
	}
	
	if(isset($_SESSION['nameC'])){
	
		unset($_SESSION['nameC']);
	}
	
	if(isset($_SESSION['keyC'])){
	
		unset($_SESSION['keyC']);
	}
	//echo'<div id="topo"><img src="img/logo.png" /><div id="exit"></div></div>';
	//echo'<div id="centralHome">';
	//echo'<a href="cadastro.php"><img src="img/signup_button.png" width="300" /></a>';
	//echo'<a href="login.php"><img src="img/login_button.png" width="300" /></a>';
	//echo'</div>';
	rodape();

?>
