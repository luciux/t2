<?php
	
	include 'functions.php';
	include'tests.php';
	
	
	
	topo('L-W-I-G');
	
	echo'<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	
	islogado(); // testa se o login foi efetuado
	
	echo'<div id="topo"><img src="img/logo.png" /><div id="exit"><a href="exit.php">Sair</a></div></div>';
	
	
	echo '<p>Welcome to Music Tube</p>'; 
	
	if(isset($_SESSION['erro'])){
		
		echo'<p>'.$_SESSION['erro'].'</p>';
		unset($_SESSION['erro']);
	}
	
	echo'<p>';
	echo '<div id="centralSearch">';
	echo '<form method="post" action="pesquisar.php">';
	
		
			echo '<p><input type="text" value="Nome musica, by Nome Banda" name="music" /></p>';
			echo '<p><input type="submit" name="pesquisar" value="Search" /></p>';
		
	echo '</form>';
	echo '</div">';

		
		echo'<div id="socialNetworks">';
		echo'<iframe src="http://www.facebook.com/plugins/like.php?href=http://lucianojr.my.phpcloud.com/t3/&layout=standard&<br>
show_faces=false&width=380&action=like&colorscheme=light&height=25&locale=pt_BR" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:25px;" allowTransparency="true"></iframe>';
		echo'<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="SeuTwitter" rel="nofollow">Tweet</a>';
	
		echo'</div>';
	
	rodape();
	
?>

