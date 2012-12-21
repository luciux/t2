<?php

	session_start(); 
	include'functions.php';
	
	topo('login');
	
	echo'<div id="topo"><img src="img/logo.png" /><div id="exit"><a href="exit.php">Sair</a></div></div>';
	
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){ // testa, se ja esta logado no ambiente, caso estiver redireciona para a pagina das pesquisas
	
		header('Location:musicsys.php');
		exit();
	}

	if(isset($_SESSION['erro'])){
		
		echo '<p>'.$_SESSION['erro'].' </p>';
		unset($_SESSION['erro']);
	}

		
	echo'<div id="formBox">';
	echo '<form method="post" action="logar.php">';
	echo '<p>Login:<input type="text" name="login" value="'.@$_SESSION['name'].'"/> </p>';
	echo '<p>Senha:<input type="password" name="senha" value="'.@$_SESSION['key'].'"/> </p>';
	echo '<input type="submit" name="logar" value="Logar" />';
	
	echo '</form>';
		
	echo'</div>';
	
	if(isset($_SESSION['name'])){
	
		unset($_SESSION['name']);
	}
	
	if(isset($_SESSION['key'])){
	
		unset($_SESSION['key']);
	
	}
	
	rodape();
?>