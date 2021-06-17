<div style="height:70px !important" class="bottom-space"></div>
</div>

<script src="<?= getHTMLRoot() ?>/assets/js/vertical-responsive-menu.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/owl.carousel.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/vendor/semantic/semantic.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/custom.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/night-mode.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/moment.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/jquery.upload.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/jquery.multiselect.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/date.min.js"></script>
<script src="https://use.fontawesome.com/b94878848f.js"></script>


<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.jqueryui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById("year").innerHTML = n;


    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function() {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    function parse_my_query(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
        console.log('Query variable %s not found', variable);
    }
</script>
</body>

</html>
<?php
if (isset($_REQUEST['Success'])) {
    echo "<script>";
    echo "$(document).ready(function() {";
    echo "$('#alert').fadeTo(2000, 500).slideUp(500, function() {";
    echo "$('#alert').slideUp(500);";
    echo "});";
    echo "});";
    echo "</script>";
}
?>
<?php
if (isset($_REQUEST['error'])) {
    echo "<script>";
    echo "$(document).ready(function() {";
    echo "$('#alertdanger').fadeTo(2000, 500).slideUp(500, function() {";
    echo "$('#alertdanger').slideUp(500);";
    echo "});";
    echo "});";
    echo "</script>";
}
?>