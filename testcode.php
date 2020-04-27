<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	Hello
</body>
</html>
<script>
	$(document).ready(function() {
var city = "Karnadaka";
var area = "";
var listing_type = "RENT";

var data = {};

if(city != '')
    data['city'] = city;

if(area != '')
    data['area'] = area;

if(listing_type != '')
    data['listing_type'] = listing_type;

$.ajax({
    type: 'GET',
    url: "result.php",
    data: data,
    success: function(response) {
        console.log(response);
    }
});});
</script>