<?php 
	include 'connect.php'; 
	include 'functions.php';
	include 'header.php';


?>

	
	
	<div id="prod_body" class="body_wrap centring">
		<div id="prod_banner" class="banner_wrap">
		
			<!-- Skapar en länk som leder till en recension samt ett par block som håller de olika objekten !-->
			<?php 
				
				for($x=0; $x<10; $x++){
					$row = selProdID($pdo, 2);
					if($x % 3 == 0){
						echo '
							<a href="pr.php?id='.$row[2].'">
								<div id="prod_first_item" class="banner box" >
									<div id="prod_img" class="banner_imgwrap"><img src="'.$row[5].'" alt="destiny"></div>
									<div id="prod_bread"class="banner_text"><p>' . $row[3] .'</p></div>
									<div class="banner_header"><p>Price: '.$row[1].' SEK</p></div>
								</div>			
							</a>
						';
					}else{
						echo '
							<a href="pr.php?id='.$row[2].'">
								<div id="prod_item" class="banner box" >
									<div id="prod_img" class="banner_imgwrap"><img src="'.$row[5].'" alt="destiny"></div>
									<div id="prod_bread"class="banner_text"><p>' . $row[3] .'</p></div>
									<div class="banner_header"><p>Price: '.$row[1].' SEK</p></div>
								</div>			
							</a>
						';

					}
				}
			?> 
		</div>
	</div>
</body>