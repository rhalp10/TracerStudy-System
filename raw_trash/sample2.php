<!doctype html>
<html>
<head>
    <title>Pie Chart</title>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
</head>

<body>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area1" />
    </div>
    <br>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area2" />
    </div>

    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area3" />
    </div>
    <br>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area4" />
    </div>

    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area5" />
    </div>
    <br>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area6" />
    </div>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area7" />
    </div>
    <br>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area8" />
    </div>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area9" />
    </div>
    <br>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area10" />
    </div>



    <script>

    	var a = '10';
    	var b = '50';
    	var c = '40';
    var config1 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    a,
                    b,
                    c
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow"
            ]
        },
        options: {
            responsive: true
        }
    };
       	var d = '50';
    	var e = '35';
    	var f = '15';
    var config2 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    d,
                    e,
                    f
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow"
            ]
        },
        options: {
            responsive: true
        }
    };
        var g = '35';
    	var h = '50';
    	var i = '15';
    var config3 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    g,
                    h,
                    i
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area1").getContext("2d");
        window.myPie = new Chart(ctx, config1);

        var ctx = document.getElementById("chart-area2").getContext("2d");
        window.myPie = new Chart(ctx, config2);

        var ctx = document.getElementById("chart-area3").getContext("2d");
        window.myPie = new Chart(ctx, config3);

        var ctx = document.getElementById("chart-area4").getContext("2d");
        window.myPie = new Chart(ctx, config4);

        var ctx = document.getElementById("chart-area5").getContext("2d");
        window.myPie = new Chart(ctx, config5);

        var ctx = document.getElementById("chart-area6").getContext("2d");
        window.myPie = new Chart(ctx, config6);

        var ctx = document.getElementById("chart-area7").getContext("2d");
        window.myPie = new Chart(ctx, config7);

        var ctx = document.getElementById("chart-area8").getContext("2d");
        window.myPie = new Chart(ctx, config8);

        var ctx = document.getElementById("chart-area9").getContext("2d");
        window.myPie = new Chart(ctx, config9);

        var ctx = document.getElementById("chart-area10").getContext("2d");
        window.myPie = new Chart(ctx, config10);
    };



  
    </script>
</body>

</html>
