

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Calculator</title>
    <style type="text/css">
    	html,
body{
 height: 100%;
}
.select_button{
	margin: 5px;
}
    </style>
  </head>
  <body>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<br>
	<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <h1 class="display-3">Simple Calculator</h1>
                    <div class="info-form">
                        <form action="" class="form-inline justify-content-center">

	                        <input type="" name="" class="form-control col-sm-12" id="input_text">
                        	<div class="col-sm-10 ">
								<hr>
								<div class="text-center select_button">
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('7')">7</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('8')">8</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('9')">9</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('/')">/</a>
								</div>

								
								<div class="text-center select_button">
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('4')">4</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('5')">5</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('6')">6</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('x')">x</a>
								</div>
								<div class="text-center select_button ">
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('1')">1</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('2')">2</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('3')">3</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('-')">-</a>
								</div>
								<div class="text-center select_button">
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('0')">0</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('.')">.</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('9')">9</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:addTextTag('+')">+</a>

								</div>
								<div class="text-center select_button">
									<a name="" class="btn btn-outline-primary col-sm-1"  href="javascript:addTextTag('(')">(</a>
									<a name="" class="btn btn-outline-primary col-sm-1"  href="javascript:addTextTag(')')">)</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:removeTextTag()">DELETE</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:clearTextTag()">CLEAR</a>
									<a name="" class="btn btn-outline-primary col-sm-2"  href="javascript:answerTextTag()">=</a>
								</div>
							</div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
  </body>
</html>

<script type="text/javascript">

	function addTextTag(txt)
	{
	document.getElementById("input_text").value+=txt;
	}
	function clearTextTag(txt)
	{
	document.getElementById("input_text").value="";
	}
    function removeTextTag()
	{
	var strng=document.getElementById("input_text").value;
	document.getElementById("input_text").value=strng.substring(0,strng.length-1);
	}

	function answerTextTag()
	{
		var a = parseInt("10");
		var b = parseInt("10");
		var c = a+b;

    var str = document.getElementById("input_text").value;
    var res = str.split("");
    document.getElementById("input_text").value = res;//display the splited value

    var temp = new Array();
    var temp = str.split("");
    for (a in temp ) {
   	 if (isNaN(temp[a])) 
   	 {
   	 console.log (temp[a] = temp[a]);
	 }
	 else
	 {
	 	console.log (temp[a] = parseInt(temp[a], 10));
	 }
	}
	}
</script>