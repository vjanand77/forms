<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#pp_pp").load("demo.txt");

    $.post("demo.asp",
    {
    	name: "Anand",
    	city: "Coimbatore"
    },
    function(data, status){
    	alert("Data: " + data + "\nStatus: " + status );
    });
  });
});
</script>
</head>
<body>
	<h3>Click below to view the text</h3>
	<p id="pp_pp"></p>
	<button>Tap me!</button>
</body>
</html>