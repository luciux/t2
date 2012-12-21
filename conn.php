<?php
 
	//nome do servidor (localhost)
	$servidor = "lucianojr-db.my.phpcloud.com:3306";
 
	//usuario do banco de dados
	$user = "lucianojr";
 
	//senha do banco de dados
	$senha = "lostpatience";
 
	//nome da base de dados
	$db = "lucianojr";
 
	//executa a conexao com o banco, caso contrario mostra o erro ocorrido
	$conexao = mysql_connect($servidor,$user,$senha) or die (mysql_error());
 
	//seleciona a base de dados daquela conexao, caso contrario mostra o erro ocorrido
	$banco = mysql_select_db($db, $conexao) or die(mysql_error());
?>