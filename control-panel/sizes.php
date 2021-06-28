<?php
include_once('web-config.php');
getHeader("Sizes", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sizes</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    HTMLToast();
    ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Size</h5>
                <form action="Controllers/Size" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="SizeValue">Size Value</label>
                            <input type="text" name="SizeValue" class="form-control" id="SizeValue" placeholder="Please type size value">
                        </div>
                        <button name="CreateSize" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <h2>Sizes</h2>
        <div data-label="Categories" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-25p">Size Value</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('models/category-model.php');
                    $CategoryModel = new Category();
                    $CategoryList = $CategoryModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($CategoryList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['CategoryName'] ?></td>
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