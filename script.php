<!--jQuery -->
<script src="assets/lib/jquery/jquery.js"></script>

<script src="assets/js/prism.min.js"></script>

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
        console.log("document ready!");
       
        var $sticky = $('.sticky');
        var $stickyrStopper = $('.sticky-stopper');
        if (!!$sticky.offset()) { // make sure ".sticky" element exists

            var generalSidebarHeight = $sticky.innerHeight();
            var stickyTop = $sticky.offset().top;
            var stickOffset = 0;
            var stickyStopperPosition = $stickyrStopper.offset().top;
            var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
            var diff = stopPoint + stickOffset;

            $(window).scroll(function() { // scroll event
                var windowTop = $(window).scrollTop(); // returns number

                if (stopPoint < windowTop) {
                    $sticky.css({
                        position: 'absolute',
                        top: diff
                    });
                } else if (stickyTop < windowTop + stickOffset) {
                    $sticky.css({
                        position: 'fixed',
                        top: stickOffset
                    });
                } else {
                    $sticky.css({
                        position: 'absolute',
                        top: 'initial'
                    });
                }
            });

        }
    });


 $(document).ready(function() {
    $('#example').DataTable( {
        serverSide: true,
        ordering: false,
        searching: false,
        ajax: function ( data, callback, settings ) {
            var out = [];
 
            for ( var i=data.start, ien=data.start+data.length ; i<ien ; i++ ) {
                out.push( [ i+'-1', i+'-2', i+'-3', i+'-4', i+'-5' ] );
            }
 
            setTimeout( function () {
                callback( {
                    draw: data.draw,
                    data: out,
                    recordsTotal: 5000000,
                    recordsFiltered: 5000000
                } );
            }, 50 );
        },
        scrollY: 200,
        scroller: {
            loadingIndicator: true
        }
    } );
     $('#example1').DataTable( {  "aaSorting": []  } );
    
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
