<script>
    // REGISTERED VALUE Declaration of variable 
    var student_Percent = <?php echo $js_outStudent_Register; ?>;
    var Teacher_Percent = <?php echo $js_outTeacher_Register; ?>;
    var Admin_Percent = <?php echo $js_outAdmin_Register; ?>;
    // REGISTERED VALUE Parsing of variable
    var student_Parse = parseInt(student_Percent);
    var teacher_Parse = parseInt(Teacher_Percent);
    var admin_Parse = parseInt(Admin_Percent);
    //REGISTERED VALUE Parsed Data passed on variable
    var a = student_Parse;
    var b = teacher_Parse;
    var c = admin_Parse;
    var total_register = a+b+c;
   



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
                "Student ",
                "Teacher ",
                "Admin ",

            ]
        },
        options: {
           title: {
             display: true,
             text: 'Total Account Register: '+total_register
           }
         }
    };
    

        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

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