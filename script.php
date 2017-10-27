<!--jQuery -->
<script src="assets/lib/jquery/jquery.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>

<!--Bootstrap -->
<script src="assets/lib/bootstrap/js/bootstrap.js"></script>
<!-- MetisMenu -->
<script src="assets/lib/metismenu/metisMenu.js"></script>
<!-- onoffcanvas -->
<script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
<!-- Screenfull -->
<script src="assets/lib/screenfull/screenfull.js"></script>

<!-- Metis core scripts -->
<script src="assets/js/core.js"></script>
<!-- Metis demo scripts 

            <script src="assets/js/style-switcher.js"></script>-->
<script src="assets/js/app.js"></script>

<script type="text/javascript" language="javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

 $(document).ready(function() {
                var dataTable = $('#forumData_Unpin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    "bSort": false,
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_forumUnpin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_Unpin-error").html("");
                            $("#forumData_Unpin").append('<tbody class="forumData_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_Unpin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
 $(document).ready(function() {
                var dataTable = $('#forumData_Pin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    "bSort": false,
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_forumPin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_Pin-error").html("");
                            $("#forumData_Pin").append('<tbody class="forumData_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_Pin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
 $(document).ready(function() {
                var dataTable = $('#alumniIT').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    "bSort": false,
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_IT_Alumni.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".alumniIT-error").html("");
                            $("#alumniIT").append('<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#alumniIT_processing").css("display","none");
                            

                        }
                        
                    }
                } );



                
            } );

     $(document).ready(function() {
                var dataTable = $('#alumniCS').DataTable( {
                    // "stripeClasses": [],
                    
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                     "bSort": false,
                     "bLengthChange": false,
                     "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_CS_Alumni.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".alumniCS-error").html("");
                            $("#alumniCS").append('<tbody class="alumniCS-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#alumniCS_processing").css("display","none");
                            

                        }
                        
                    }
                } );
           } );
$(document).ready(function() {
      var dataTable = $('#alumniOA').DataTable( {
          // "stripeClasses": [],
          
          "processing": true,
          "serverSide": true,
          "bAutoWidth": false,
           "bSort": false,
           "bLengthChange": false,
           "columnDefs": [ {
              className: "forum-td",
                "targets": 0,
                "searchable": false
              }],
              // "initComplete": function () {
              //     $( document ).on("click", "tr[role='row']", function(){
              //         // var year_data = document.getElementById("year_data" ).innerHTML;
              //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
              //          jQuery("tr").addClass("myClass");
              //          window.location='alumni_view.php?course=IT&year='+year_data;

              //     });
              // },
          "ajax":{
              url :"serverside_data_OA_Alumni.php", // json datasource
              type: "post",  // method  , by default get
              error: function(){  // error handling
                  $(".alumniOA-error").html("");
                  $("#alumniOA").append('<tbody class="alumniOA-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                  $("#alumniOA_processing").css("display","none");
                  

              }
              
          }
      } );
  } );
 
    $(document).ready(function() {
                var dataTable = $('#registerstud_serverside').DataTable( {

                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                     "bSort": false,
                     "bLengthChange": false,
                     "columnDefs": [ {
                        className: "text-center",
                          "targets": 1,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 2,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 3,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                              "targets": 4,
                              "searchable": false
                        }],
                    "ajax":{
                        url :"serverside_data_registerstud.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".registerstud_serverside-error").html("");
                            $("#eregisterstud_serverside").append('<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#registerstud_serverside_processing").css("display","none");
                            

                        }
                        
                    }
                } );


                
            } );
$(document).ready(function() {
                var dataTable = $('#forumData_User_Unpin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    "bSort": false,
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_forumData_User_Unpin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_User_Unpin-error").html("");
                            $("#forumData_User_Unpin").append('<tbody class="forumData_User_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_User_Unpin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
 $(document).ready(function() {
                var dataTable = $('#forumData_User_Pin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    "bSort": false,
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_forumData_User_Pin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_User_Pin-error").html("");
                            $("#forumData_User_Pin").append('<tbody class="forumData_User_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_User_Pin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
    //NUMBER ONLY
    function numberInputOnly(elem) {
        var validChars = /[0-9]/;
        var strIn = elem.value;
        var strOut = '';
        for (var i = 0; i < strIn.length; i++) {
            strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
        }
        elem.value = strOut;
    }
    //LETTER ONLY
    function letterInputOnly(elem) {
        var validChars = /[a-zA-ZñÑ .]+/;
        var strIn = elem.value;
        var strOut = '';
        for (var i = 0; i < strIn.length; i++) {
            strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
        }
        elem.value = strOut;
    }
</script>


<script type="text/javascript">
$('.btn[data-toggle=modal]').on('click', function(){
  var $btn = $(this);
  var currentDialog = $btn.closest('.modal-dialog'),
  targetDialog = $($btn.attr('data-target'));;
  if (!currentDialog.length)
    return;
  targetDialog.data('previous-dialog', currentDialog);
  currentDialog.addClass('aside');
  var stackedDialogCount = $('.modal.in .modal-dialog.aside').length;
  if (stackedDialogCount <= 5){
    currentDialog.addClass('aside-' + stackedDialogCount);
  }
});

$('.modal').on('hide.bs.modal', function(){
  var $dialog = $(this);  
  var previousDialog = $dialog.data('previous-dialog');
  if (previousDialog){
    previousDialog.removeClass('aside');
    $dialog.data('previous-dialog', undefined);
  }
});


</script>
