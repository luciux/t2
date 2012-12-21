<?php
	//Aqui vamos pegar as chaves e usar as apisss.. tanto do youtube como do last fm.
	function busca($chaveNomeMusica,$chaveNomeBanda){
		
		//header('Location:www.youtube.com');
		
		header("Location:http://gdata.youtube.com/feeds/api/videos?q=$chaveNomeMusica+$chaveNomeBanda");
	
	
	
	}

?>