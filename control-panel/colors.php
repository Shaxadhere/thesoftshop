<?php
include_once('web-config.php');
getHeader("Colors", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Colors</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    HTMLToast();
    ?>
    <div id='success-alert' class='container-fluid' style="display:none">
        <div class='alert alert-success d-flex' role='alert'>
            <i data-feather='alert-circle' class='mg-r-10'></i> <span id="success-alert-msg"></span>
        </div>
    </div>
    <div id='error-alert' class='container-fluid' style="display:none">
        <div class='alert alert-danger d-flex' role='alert'>
            <i data-feather='alert-triangle' class='mg-r-10'></i> <span id="error-alert-msg"></span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Colors</h5>
                <form action="Controllers/Color" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ColorName">Color Name</label>
                            <input type="text" name="ColorName" class="form-control" id="ColorName" placeholder="Please type color name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="CategorySlug">Color Code</label><br>
                            <input type="hidden" name="ColorCode" id="ColorCode" value="" />
                            <input type="text" class="form-control" id="colorpicker">
                        </div>
                    </div>
                    <button name="CreateColor" id="CreateColor" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <hr>
        <h2>Colors</h2>
        <div data-label="Categories" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-25p">Color Name</th>
                        <th class="wd-20p">Color</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('models/color-model.php');
                    $ColorModel = new Color();
                    $ColorList = $ColorModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($ColorList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['ColorName'] ?></td>
                            <td><div class="square" style="border: 1px solid lightgrey;height: 30px;width: 30px;<?= $row['ColorCode'] ?>;"></div></td>
                            <td>
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropleftMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary" href="#">Edit</a>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                    <div class="wd-200 pd-15">
                                        <p><strong>Created By:</strong>Admin</p>
                                        <p class="mb-0"><strong>Created At:</strong><?= $row['CreatedAt'] ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $SNo++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>
<script>
    $(document).on('change', '#colorpicker', function() {
        var ColorCode = $('.sp-preview-inner').attr("style")
        $('#ColorCode').val(ColorCode)
    })
    $(document).on('click', '#CreateColor', function() {
        var colorName = $('#ColorName').val()
        var colorCode = $('#ColorCode').val()
        $.ajax({
            type: "POST",
            url: "controllers/Color",
            data: {
                CreateColor: true,
                ColorName: colorName,
                ColorCode: colorCode
            },
            success: function(response) {
                if (response == true) {
                    $('#success-alert-msg').html("Color added successfully!")
                    $('#success-alert').show()
                    setTimeout(function() {
                        $('#success-alert').hide()
                    }, 3000)

                } else {
                    var result = JSON.parse(response)
                    $('#error-alert-msg').html(result[0])
                    $('#error-alert').show()
                    setTimeout(function() {
                        $('#error-alert').hide()
                    }, 3000)
                }
            },
            error: function(error) {
                console.log("Error in connection: " + error)
            }
        })
    })
</script>