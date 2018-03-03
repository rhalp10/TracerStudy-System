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
    var config1 = {
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

        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var config2 = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Unregister",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        a,
                        b,
                        c
                    ],
                    fill: false,
                }, {
                    label: "Register",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        d,
                        e+1,
                        f,
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Account Record Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };
    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);

        var ctx1 = document.getElementById("chart-area1").getContext("2d");
        window.myPie = new Chart(ctx1, config1);

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
new Chart(document.getElementById("bar-chart1"), {
    type: 'bar',
    data: {
      labels: ["Student", "Teacher", "Admin"],
      datasets: [
        {
          label: "Population",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [d,e,f]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Population of Unregistered Account'
      }
    }
});
    </script>