function submitdata()
{
	event.preventDefault();
	var userId=document.getElementById( "user_id" );
	var productId=document.getElementById( "product_id" );

	$.ajax({
		type: 'POST',
		url: 'php_scripts/insertdata.php',
		data: {userId:user_id, productId:product_id},
		success: function (response) {
		$('#success__para').html("Added to Cart");
	}
});