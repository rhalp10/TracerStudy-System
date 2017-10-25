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
        $('#myData').DataTable({
            //"paging":   false,
            "ordering": false,
            "info": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
    $(document).ready(function() {
        $('#myData1').DataTable({
            //"paging":   false,
            "ordering": false,
            "info": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });

    $(document).ready(function() {
        $('#alumniIT').DataTable({
            //"paging":   false,
            "ordering": false,
            "info": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });

    $(document).ready(function() {
        $('#alumniCS').DataTable({
            //"paging":   false,
            "ordering": false,
            "info": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
    $(document).ready(function() {
        $('#alumniOA').DataTable({
            //"paging":   false,
            "ordering": false,
            "info": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });

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