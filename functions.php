<?php

	function topo($title){
		echo'<!DOCTYPE HTML>';
		echo'<html>';
		echo'<head>';
		echo'<link href="estilo.css" rel="stylesheet" />';
		echo'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
		echo"<title>$title</title>";
		echo'</head>';
		echo'<body>';		
	}
	
	function rodape(){
		echo'</body>';
		echo'</html>';
	}
	
	function lirycs_decode($letra){
		
		$posInitMusic = strpos($letra, "text") + 7; //para pular a palavra e as aspas por isso + 7
		
		if(!(strpos($letra, "translate") == FALSE)){
				
			$posEndMusic = strpos($letra, "translate") - 3; // para cortar aspas e virgula
		}
		
		else{
			
			$posEndMusic = strrpos($letra, '"');
		}
		
		
		$offSet = $posEndMusic - strlen($letra); 
		
		
		return  substr($letra, $posInitMusic, $offSet);
		
	}
?>