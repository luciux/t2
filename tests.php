<?php 
	session_start();
	
	function islogado(){
		if((isset($_SESSION['logado'])) && ($_SESSION['logado'] == 1)){
			
		}
		else{
			header('Location:index.php');
			$_SESSION['erro'] = 'Área do site restrita requer login para acessa-lá';
			exit();
		}
	}
?>