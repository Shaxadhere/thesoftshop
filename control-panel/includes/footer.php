<?php
include_once('web-config.php');
?>
</div>

<script src="<?= getHTMLRoot() ?>/assets/lib/jquery/jquery.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/feather-icons/feather.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/jquery.flot/jquery.flot.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/chart.js/Chart.bundle.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/lib/select2/js/select2.min.js"></script>

<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/bootstrap-tagsinput.min.js"></script>

<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.aside.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.sampledata.js"></script>

<!-- append theme customizer -->
<script src="<?= getHTMLRoot() ?>/assets/lib/js-cookie/js.cookie.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashboard-one.js"></script>
<script src="<?= getHTMLRoot() ?>/assets/js/dashforge.settings.js"></script>


</body>

</html>


<script>
    $('#main-table').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page'
        }
    });
    $('#normal-table').DataTable({
        responsive: false,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page'
        }
    });

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
    // Adding placeholder for search input
    (function($) {
        'use strict'
        var Defaults = $.fn.select2.amd.require('select2/defaults');
        $.extend(Defaults.defaults, {
            searchInputPlaceholder: ''
        });
        var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');
        var _renderSearchDropdown = SearchDropdown.prototype.render;
        SearchDropdown.prototype.render = function(decorated) {
            var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));
            this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));
            return $rendered;
        };
    })(window.jQuery);
    $(function() {
        'use strict'
        $('.sizes-input').select2({
            placeholder: 'Select Size',
            searchInputPlaceholder: 'Search options'
        });
        $('.colors-input').select2({
            placeholder: 'Select Color',
            searchInputPlaceholder: 'Search options'
        });
        $('.categories-input').select2({
            placeholder: 'Select Categories',
            searchInputPlaceholder: 'Search options'
        });
    });
</script>
<?php
if (isset($_REQUEST['success'])) {
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