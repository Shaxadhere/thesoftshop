<?php
include_once('web-config.php');
getHeader("Categories", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                <h5 class="card-title">Add Category</h5>
                <form action="controllers/Category" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="CategoryName">Category Name</label>
                            <input type="text" name="CategoryName" class="form-control" id="CategoryName" placeholder="Please type category name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="CategorySlug">Category Slug</label>
                            <input type="text" name="CategorySlug" class="form-control" id="CategorySlug" placeholder="Please type category slug">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="CategoryImages">Category Images</label>
                            <div class="custom-file">
                                <input type="file" name="CategoryImages[]" class="custom-file-input" id="CategoryImages" multiple>
                                <label class="custom-file-label" for="customFile">Upload Category Images</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="CategoryTags">Category Tags (Comma Seperated)</label>
                            <input type="text" name="CategoryTags" class="form-control" id="CategoryTags" placeholder="watch, discount, aesthetic..">
                        </div>
                    </div>
                    <button name="SaveCategory" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <hr>
        <h2>Categories</h2>
        <div data-label="Categories" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-25p">Category Name</th>
                        <th class="wd-20p">Category Slug</th>
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
                            <td><?= $row['CategorySlug'] ?></td>
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
    //get category slug
    $(document).on('keyup', '#CategoryName', function() {
        var category = $(this).val()
        $.ajax({
            type: "POST",
            url: "controllers/Category",
            data: {
                GenerateSlug: true,
                CategoryName: category
            },
            success: function(response) {
                var result = JSON.parse(response)
                if (result['success'] == true) {
                    if (result['slug'] != "n-a") {
                        $('#CategorySlug').val(result['slug'])
                    } else {
                        $('#CategorySlug').val("")
                    }
                } else {
                    console.log("Error in generating slug")
                }
            },
            error: function(error) {
                console.log("Error in connection: " + error)
            }
        })
    })
</script>