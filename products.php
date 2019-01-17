<?php 
	include 'header.php';
	include 'connect.php'; 
	include 'functions.php';
?>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
	
	
	<div id="prod_body" class="body_wrap centring">
		<div id="prod_banner" class="banner_wrap">
		<br>
		<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search product..." />
        <div class="result"></div>
    </div>
		
			<!-- Skapar en länk som leder till en recension samt ett par block som håller de olika objekten !-->
			<?php 
				
				/*for($x=0; $x<10; $x++){
					$row = selProdID($pdo, 2);
					if($x % 3 == 0){
						echo '
							<a href="product_page.php?id='.$row[2].'">
								<div id="prod_first_item" class="banner box" >
									<div id="prod_img" class="banner_imgwrap"><img src="'.$row[5].'" alt="destiny"></div>
									<div id="prod_bread"class="banner_text"><p>' . $row[3] .'</p></div>
									<div class="banner_header"><p>'.$row[1].' <span>SEK</span></p></div>
								</div>			
							</a>
						';
					}else{
						echo '
							<a href="product_page.php?id='.$row[2].'">
								<div id="prod_item" class="banner box" >
									<div id="prod_img" class="banner_imgwrap"><img src="'.$row[5].'" alt="destiny"></div>
									<div id="prod_bread"class="banner_text"><p>' . $row[3] .'</p></div>
									<div class="banner_header"><p><span>'.$row[1].' SEK</span></p></div>
								</div>			
							</a>
						';

					}
				}*/
			?> 
		</div>
	</div>
</body>