<html>
<head>
<TITLE>jQuery AJAX Autocomplete - Country Example</TITLE>
<head>
<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#name-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#name-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#name-list li:hover{background:#d2deec;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>



     <script type="text/javascript" language="javascript" src="assets/js/jquery.js"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "message_usersuggest.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(assets/img/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectName(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<form class="form-control">
	<input class="form-control" type="text" id="search-box" placeholder="Receipient Name" />
	<div id="suggesstion-box"></div>
</form>
</body>
</html>