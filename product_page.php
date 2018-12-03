<?php
	include 'connect.php';
	include 'functions.php';
	include 'header.php';

	$id = $_GET['id'];
	$row = selProdID($pdo, $id);
?>
	
	<div class="body_wrap centring box">
		<!-- Rubrik !-->
		
	<?php
		
echo'
	<div id="header" class="centring"><h1>'.$row[3].'</h1></div>
		
		
		<!-- Skapar bild !-->
		<div class="review_img">
			<img src="'.$row[5].'" alt="">
		</div>
		<!-- Två textfält !-->
		<div class="text_wrap">
			<p>'.$row[4].'</p>
		</div>
		<div class="text_wrap">
			<p>'.$row[4].'</p>
		</div>
	</div>';
	?>
	
	<!-- Förslag på andra artiklar !-->
	<div id="suggested" class="centring">
		<div id="sug_ban"><p>Suggested content:</p></div>
		<div class="banner_wrap">
			<!-- Länk samt containrar för bild och text !-->
			<?php
				for($x=0; $x<2; $x++){
					echo '
						<a href="read_ea.html">
							<div class="banner box">
								<div class="banner_imgwrap"><img src="'.$row[5].'" alt=""></div>
								<div class="banner_header"><p>'.$row[3].'</p></div>
								<div class="banner_text"><p>'.$row[1].'</p></div>
					
							</div>
						</a>
					';
				}
			?>

		</div>
	</div>
</body>
	