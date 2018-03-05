<script>

    //UNREGISTERD VALUE Declaration of variable
    var student_Percent_unregister = <?php echo $js_outStudent_UnRegister; ?>;
    var Teacher_Percent_unregister = <?php echo $js_outTeacher_UnRegister; ?>;
    var Admin_Percent_unregister = <?php echo $js_outAdmin_UnRegister; ?>;
    //UNREGISTERD VALUE Parsing of variable
    var student_Parse_unregister = parseInt(student_Percent_unregister);
    var teacher_Parse_unregister = parseInt(Teacher_Percent_unregister);
    var admin_Parse_unregistere = parseInt(Admin_Percent_unregister);
    //UNREGISTERD VALUE Parsed Data passed on variable
    var d = student_Parse_unregister;
    var e = teacher_Parse_unregister;
    var f = admin_Parse_unregistere;

    var total_unregister = d+e+f;




    var config = {
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
                    window.chartColors.blue,
                ],
                label: 'Dataset 2'
            }],
            labels: [
                "Student ",
                "Teacher ",
                "Admin "
            ]
        },
        options: {
           title: {
             display: true,
             text: 'Total Account Unregister: '+total_unregister
           }
         }
    };

   
    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);


            var ctx2 = document.getElementById("chart-line").getContext("2d");
            window.myLine = new Chart(ctx2, config2);
    };

new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Student", "Teacher", "Admin"],
      datasets: [
        {
          label: "Population",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [a,b,c]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Population of Registered Account'
      }
    }
});
    </script>