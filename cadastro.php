<?php
	
	session_start();
	include'functions.php';
	
	topo('cadastro');
	
	echo'<div id="topo"><img src="img/logo.png" /><div id="exit"></div></div>';
	
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
		
		header('Location:musicsys.php');
		exit();
	}
	

	if(isset($_SESSION['erro'])){
		
		echo '<p>'.$_SESSION['erro'].' </p>';
		unset($_SESSION['erro']);
	}
	
	echo'<div id="formBox">';
	
	echo '<form method="post" action="cadastraUsuario.php">';
	echo '<p>Login:<input type="text" name="login" value="'.@$_SESSION['name'].'" /></p>';
	echo '<p>Senha:<input type="password" name="senha" value="'.@$_SESSION['key'].'" /></p>';
	echo '<input type="submit" name="Cadastrar" value="Cadastrar" />';
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