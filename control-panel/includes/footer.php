<?php
include_once('web-config.php');
?>
</div>

<script src="<?= getHTMLRoot() ?>/lib/jquery/jquery.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/feather-icons/feather.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/jquery.flot/jquery.flot.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/chart.js/Chart.bundle.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= getHTMLRoot() ?>/lib/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.aside.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.sampledata.js"></script>

<!-- append theme customizer -->
<script src="<?= getHTMLRoot() ?>/lib/js-cookie/js.cookie.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashboard-one.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.settings.js"></script>


</body>
</html>


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
</body>

</html>