<?php
	
	include 'buscar.php';
	include 'functions.php';
	include'tests.php';
	
	topo('Search');
	
	islogado(); // testa se o login foi efetuado
	
	if(isset($_POST['music'])){
			
		$music = $_POST['music'];
	}
	else{
		
		$_SESSION['erro'] = 'Parece haver um erro com sua pesquisa, tente novamente!';
		header('Location:musicsys.php');
		exit();
	}
	
	
	
	//Separar string em partes na estrutura Nome Musica, by Name Banda
	
	$posVirgula = strrpos($music, ','); // Encontra a ultima ocorrencia de uma virgula na string
	
	$chaveNomeMusica = substr($music,0,$posVirgula);
	
	$chaveNomeBanda = substr($music,$posVirgula+1); // Deixa somente a parte depois da virgula
	
	
	$posBy = strpos($chaveNomeBanda, 'by') + 2; // Obtem a posicao da palavra chave da busca by, adicionanda + 2 que e para pular ela
	
	$chaveNomeBanda = substr($chaveNomeBanda, $posBy); // Deixa somente o nome da musica apos a palavra chave by
	
	echo "<p>Chave do nome da musica: <strong>$chaveNomeMusica</strong></p>";
	echo "<p>Chave do nome da banda: <strong>$chaveNomeBanda</strong></p>";
	
	
	header('Location:testaCurl.php?musica='.$chaveNomeMusica.'& artista='.$chaveNomeBanda.'');
	
	rodape();
	



?>