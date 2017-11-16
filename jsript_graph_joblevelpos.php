<script>
    // REGISTERED VALUE Declaration of variable 
    var firstjob_Percent = <?php echo $js_outFirst_Job_Percentage_ROC; ?>;
    var currentjob_Percent = <?php echo $js_outCurret_Present_Job_Percentage_ROC; ?>;
    var bothpick_Percent = <?php echo $js_outBoth_Pick_Percentage_ROC; ?>;
    // REGISTERED VALUE Parsing of variable
    var firstjob_Parse = parseInt(firstjob_Percent);
    var currentjob_Parse = parseInt(currentjob_Percent);
    var bothpick_Parse = parseInt(bothpick_Percent);
    //REGISTERED VALUE Parsed Data passed on variable
    var a = firstjob_Parse;
    var b = currentjob_Parse;
    var c = bothpick_Parse;
   
    var total_chkdata_Roc = a+b+c;
   


    var config = {
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
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "First Job ",
                "Current Job ",
                "Both Pick",

            ]
        },
        options: {
           title: {
             display: true,
             text: 'Total of Rank or Clerical: '+total_chkdata_Roc
           }
         }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);

    };

    </script>