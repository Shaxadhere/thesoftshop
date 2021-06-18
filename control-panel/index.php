<?php
include_once('web-config.php');
getHeader("Home", "includes/header.php");
?>
<ol class="breadcrumb df-breadcrumbs mg-b-10">
    <li class="breadcrumb-item">
        <a href="../components.html#">Components</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Introduction</li>
</ol>

<h1 class="df-title">Introduction</h1>
<p class="df-lead">Get started with over a dozen reusable components built on top of Bootstrap with styles enhancement and additional components and options.</p>

<div class="row tx-14">
    <div class="col-sm-6">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="grid" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">Grid System</h5>
            <p class="mg-b-20">Use Bootstrap's powerful mobile-first flexbox grid to build layouts of all shapes and sizes.</p>
            <a href="grid.html" class="tx-medium">View Grid System
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-sm-6 mg-t-20 mg-sm-t-0">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="layers" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">UI Elements</h5>
            <p class="mg-b-20">UI Elements are those elements that can be found in any page with a single function and that can exist alone.</p>
            <a href="el-accordion.html" class="tx-medium">View Elements
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-sm-6 mg-t-20 mg-sm-t-25">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="edit-3" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">Forms</h5>
            <p class="mg-b-20">Examples and usage guidelines for form control styles, layout options, and custom components...</p>
            <a href="form-elements.html" class="tx-medium">View Forms
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-sm-6 mg-t-20 mg-sm-t-25">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="package" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">Utilities</h5>
            <p class="mg-b-20">For faster mobile-friendly and responsive development, template includes dozens of utility...</p>
            <a href="util-animation.html" class="tx-medium">View Utilities
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-sm-6 mg-t-20 mg-sm-t-25">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="pie-chart" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">Charts</h5>
            <p class="mg-b-20">A graphical representation of data, in which the data is represented by symbols, such as bar chart.</p>
            <a href="chart-flot.html" class="tx-medium">View Charts
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-sm-6 mg-t-20 mg-sm-t-25">
        <div class="bg-white bd pd-20 pd-lg-30 ht-sm-300 d-flex flex-column justify-content-end">
            <div class="mg-b-25">
                <i data-feather="map-pin" class="wd-50 ht-50 tx-gray-500"></i>
            </div>
            <h5 class="tx-inverse mg-b-20">Maps</h5>
            <p class="mg-b-20">Navigate the world faster and easier using these popular map plugins to use in your projects.</p>
            <a href="map-google.html" class="tx-medium">View Maps
                <i class="icon ion-md-arrow-forward mg-l-5"></i>
            </a>
        </div>
    </div>
    <!-- col-6 -->
</div>
<!-- row -->
<?php
getFooter("includes/footer.php");
?>