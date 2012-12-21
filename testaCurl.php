<?php
	
	session_start();
	include 'functions.php';
	
	topo('player');
	
	if(isset($_GET['musica'])){
		
		$musica = $_GET['musica'];
		$musica = trim($musica);
		$partesM =  explode(" ", $musica);
		$musica = implode("+", $partesM);
	}
	
	else{
		$_SESSION['erro'] = 'Parece haver um erro com sua pesquisa, tente novamente!';
		header('Location:musicsys.php');
		exit();
	}
	if(isset($_GET['artista'])){
		
		$artista = $_GET['artista'];
		$artista = trim($artista);
		$partesA =  explode(" ", $artista);
		$artista = implode("+", $partesA);
	}
	else{
		
		$_SESSION['erro'] = 'Parece haver um erro com sua pesquisa, tente novamente!';
		header('Location:musicsys.php');
		exit();
	}
	// URL do Feed RSS de videos de acordo com as chaves
	
	//echo $musica."<br \>";
	//echo $artista.'<br \>';
	
	$youTube_UserFeedURL = 'http://gdata.youtube.com/feeds/api/videos?vq='.$musica.'+'.$artista.'&max-results=1';
	
	//echo $youTube_UserFeedURL;
	
	echo $vagalumeLetra = 'http://www.vagalume.com.br/api/search.php?art='.$artista.'&mus='.$musica.'';
	
	//header('Location: '.$vagalumeLetra.'');
	
	// Usa cURL para pegar o XML do feed
	$cURL = curl_init(sprintf($youTube_UserFeedURL));
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
	$resultado = curl_exec($cURL);
	curl_close($cURL);
	
	$cURL = curl_init(sprintf($vagalumeLetra));
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
	$lyrics = curl_exec($cURL);
	curl_close($cURL);	
	
	//$lyrics = explode('\n', $lyrics);
	//$lyrics = implode('<br \>', $lyrics);
	
	$lyrics = str_replace('\n', '<br />', $lyrics);
	
	$decodeLyrics = json_decode($lyrics);
	echo'<div id="topo"><img src="img/logo.png" /></div>';
	echo'<div id="containerLetters">';
	
	if(isset($decodeLyrics->{'art'}->{'name'})){
		echo'<p><strong>Nome da banda(cantor):</strong></p>';
		echo $decodeLyrics->{'art'}->{'name'};
	}
	
	if(isset($decodeLyrics->{'mus'}[0]->{'name'})){
		echo'<p><strong>Nome da música:</strong></p>';
		echo $decodeLyrics->{'mus'}[0]->{'name'};
	}
	else{
		echo'Sem traducao';
	}
	
	echo'<p><strong>Letra:</strong></p>';
	
	if(isset($decodeLyrics->{'mus'}[0]->{'text'})){
		echo $decodeLyrics->{'mus'}[0]->{'text'};
	}
	
	if(isset($decodeLyrics->{'mus'}[0]->{'translate'})){
		echo $decodeLyrics->{'mus'}[0]->{'translate'};
	}
	
	else{
		
		echo'<p><strong>Sem traducão</strong></p>';
	}
	echo '</div>';
	//var_dump($decodeLyrics);
	
	
	
	
	//$lyrics = changeToUtf($lyrics); // para substituir os codigos malucos por acentos
	
	//echo $lyrics;
	
	//echo lirycs_decode($lyrics);
	
	rodape();
	
	// Inicia o parseamento do XML com o SimpleXML
	$xml = new SimpleXMLElement($resultado);
	
	$videos = array();
	
	// Passa por todos videos no RSS
	foreach ($xml->entry AS $video) {
		$url = (string)$video->link['href'];
	
		// Quebra a URL do video para pegar o ID
		parse_str(parse_url($url, PHP_URL_QUERY), $params);
		$id = $params['v'];
	
		// Monta um array com os dados do vÃ­deo
		$videos[] = array(
			'id' => $id,
			'titulo' => (string)$video->title,
			'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg',
			'url' => $url
		);
	}
	
	?>

	
	<?php 
	
		foreach ($videos AS $video) { 
		$caminho = $video['url'];
		//pegando marcação do codigo..
		$posInicioCodigo = strpos($caminho,'=')+1;
		$posFinalCodigo = strpos($caminho,'&');
		$tamTotalCaminho = strlen($caminho);
		$offSet = $posFinalCodigo - $tamTotalCaminho;
				
		
		$codeSrc = substr($caminho, $posInicioCodigo,$offSet);
		//catando link embed padrao
		$stringSrcIframe = 'http://www.youtube.com/embed/'.$codeSrc.'';
		//echo $stringSrcIframe;
		//echo $caminho;
		
	
		echo'<div id="videoContainer"><iframe width="580" height="300" src="'.$stringSrcIframe.'" frameborder="0" allowfullscreen></iframe></div>';
	
	
	}
	?>