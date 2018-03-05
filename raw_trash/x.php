<script type="text/javascript">
    var category = <?php echo json_encode($category, JSON_HEX_TAG); ?>;
        var js_out_total_qa4_1_true_percent = <?php echo $r1_true; ?>;
    var js_out_total_qa4_2_true_percent = <?php echo $r2_true; ?>;
    var js_out_total_qa4_3_true_percent = <?php echo $r3_true; ?>;
    var js_out_total_qa4_4_true_percent = <?php echo $r4_true; ?>;
    var js_out_total_qa4_5_true_percent = <?php echo $r5_true; ?>;
    var js_out_total_qa4_6_true_percent = <?php echo $r6_true; ?>;

    var js_out_total_qa4_1_false_percent = <?php echo $r1_false; ?>;
    var js_out_total_qa4_2_false_percent = <?php echo $r2_false; ?>;
    var js_out_total_qa4_3_false_percent = <?php echo $r3_false; ?>;
    var js_out_total_qa4_4_false_percent = <?php echo $r4_false; ?>;
    var js_out_total_qa4_5_false_percent = <?php echo $r5_false; ?>;
    var js_out_total_qa4_6_false_percent = <?php echo $r6_false; ?>;
    // REGISTERED VALUE Parsing of variable
    var js_out_total_qa4_1_true_parse = parseFloat(js_out_total_qa4_1_true_percent);
    var js_out_total_qa4_2_true_parse = parseFloat(js_out_total_qa4_2_true_percent);
    var js_out_total_qa4_3_true_parse = parseFloat(js_out_total_qa4_3_true_percent);
    var js_out_total_qa4_4_true_parse = parseFloat(js_out_total_qa4_4_true_percent);
    var js_out_total_qa4_5_true_parse = parseFloat(js_out_total_qa4_5_true_percent);
    var js_out_total_qa4_6_true_parse = parseFloat(js_out_total_qa4_6_true_percent);

    var js_out_total_qa4_1_false_parse = parseFloat(js_out_total_qa4_1_false_percent);
    var js_out_total_qa4_2_false_parse = parseFloat(js_out_total_qa4_2_false_percent);
    var js_out_total_qa4_3_false_parse = parseFloat(js_out_total_qa4_3_false_percent);
    var js_out_total_qa4_4_false_parse = parseFloat(js_out_total_qa4_4_false_percent);
    var js_out_total_qa4_5_false_parse = parseFloat(js_out_total_qa4_5_false_percent);
    var js_out_total_qa4_6_false_parse = parseFloat(js_out_total_qa4_6_false_percent);
    //REGISTERED VALUE Parsed Data passed on variable
    
    var grossearning_a = js_out_total_qa4_1_true_parse;
    var grossearning_b = js_out_total_qa4_2_true_parse;
    var grossearning_c = js_out_total_qa4_3_true_parse;
    var grossearning_d = js_out_total_qa4_4_true_parse;
    var grossearning_e = js_out_total_qa4_5_true_parse;
    var grossearning_f = js_out_total_qa4_6_true_parse;

    var grossearning_aa = js_out_total_qa4_1_false_parse;
    var grossearning_bb = js_out_total_qa4_2_false_parse;
    var grossearning_cc = js_out_total_qa4_3_false_parse;
    var grossearning_dd = js_out_total_qa4_4_false_parse;
    var grossearning_ee = js_out_total_qa4_5_false_parse;
    var grossearning_ff = js_out_total_qa4_6_false_parse;
   
    var grossearning_total = (
        grossearning_a+
        grossearning_b+
        grossearning_c+
        grossearning_d+
        grossearning_e+
        grossearning_f+
        grossearning_aa+
        grossearning_bb+
        grossearning_cc+
        grossearning_dd+
        grossearning_ee+
        grossearning_ff);

    var config = {
        type: 'pie',
        data: {
            labels: [
                "Below 5k Answered",
                "5k less than 10k Answered",
                "10k less than 15k Answered",
                "15k less than 20k Answered",
                "20k less than 25k Answered",
                "25k and above Answered",
                "5k less than 10k Unaswered",
                "5k less than 10k Unaswered",
                "10k less than 15k Unaswered",
                "15k less than 20k Unaswered",
                "20k less than 25k Unaswered",
                "25k and above Unaswered",

            ],
            datasets: [{
                data: [
                    parseInt(grossearning_a),
                    parseInt(grossearning_b),
                    parseInt(grossearning_c),
                    parseInt(grossearning_d),
                    parseInt(grossearning_e),
                    parseInt(grossearning_f),
                    parseInt(grossearning_aa),
                    parseInt(grossearning_bb),
                    parseInt(grossearning_cc),
                    parseInt(grossearning_dd),
                    parseInt(grossearning_ee),
                    parseInt(grossearning_ff)
                ],
                backgroundColor: [
                    'rgb(255, 0, 0)',
                    'rgb(255, 64, 0)',
                    'rgb(255, 128, 0)',
                    'rgb(255, 191, 0)',
                    'rgb(255, 170, 0)',
                    'rgb(191, 255, 0)',
                    'rgb(0, 255, 191)',
                    'rgb(0, 255, 255)',
                    'rgb(0, 191, 255)',
                    'rgb(0, 128, 255)',
                    'rgb(0, 64, 255)',
                    'rgb(128, 0, 255)',
                ],
                label: 'Dataset 1'
            }]
        },
        options: {

           title: {
             display: true,
             text: 'TOTAL PERCENTAGE: '+parseInt(grossearning_total)+'%'
           }
         }
    };
  window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);


    };

</script>