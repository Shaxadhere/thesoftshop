<?php
include_once('web-config.php');
getHeader("Products", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                <h5 class="card-title">Add Product</h5>
                <form action="Controllers/Product.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="ProductName">Product Name</label>
                            <input type="text" name="ProductName" class="form-control" id="ProductName" placeholder="Please type product name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Price">Price (in rupees)</label>
                            <input type="number" name="Price" class="form-control" id="Price" placeholder="Please type price">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ProductDescription">Product Description</label>
                            <textarea name="ProductDescription" id="ProductDescription" class="form-control" rows="2" placeholder="Please type product description.."></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Sizes">Sizes</label>
                            <select id="Sizes" name="Sizes" style="color:blue" class="form-control sizes-input" multiple="multiple">
                                <option label="Choose Sizes"></option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                                <option value="ExtraLarge">Extra Large</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ProductSlug">Product Slug</label>
                            <input type="text" name="ProductSlug" class="form-control" id="ProductSlug" placeholder="Please type product slug">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Categories">Select Categories</label>
                            <select id="Categories" name="Categories" style="color:blue" class="form-control categories-input" multiple="multiple">
                                <option label="Select Categories"></option>
                                <?php
                                include_once('models/category-model.php');
                                $CategoryModel = new Category();
                                $CategoryList = $CategoryModel->List();
                                while($row = mysqli_fetch_array($CategoryList)){
                                    echo "<option value='$row[CategoryName]'>$row[CategoryName]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ProductImages">Product Images</label>
                            <div class="custom-file">
                                <input type="file" name="ProductImages[]" class="custom-file-input" id="ProductImages" multiple>
                                <label class="custom-file-label" for="customFile">Upload Product Images</label>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="ProductTags">Product Tags (Comma Seperated)</label>
                            <input type="text" name="ProductTags" class="form-control" id="ProductTags" placeholder="watch, earring, diary">
                        </div>
                    </div>
                    <button name="SaveProduct" type="submit" class="btn btn-primary">Save Product</button>
                </form>
            </div>
        </div>

        <hr>
        <h2>Products</h2>
        <div data-label="Products" class="main-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.No</th>
                        <th class="wd-25p">Product Name</th>
                        <th class="wd-20p">Product Slug</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('models/product-model.php');
                    $ProductModel = new Product();
                    $ProductList = $ProductModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($ProductList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['ProductName'] ?></td>
                            <td><?= $row['ProductSlug'] ?></td>
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
    //get product slug
    $(document).on('keyup', '#ProductName', function() {
        var product = $(this).val()
        $.ajax({
            type: "POST",
            url: "Controllers/Product",
            data: {
                GenerateSlug: true,
                ProductName: product
            },
            success: function(response) {
                var result = JSON.parse(response)
                if (result['success'] == true) {
                    if (result['slug'] != "n-a") {
                        $('#ProductSlug').val(result['slug'])
                    } else {
                        $('#ProductSlug').val("")
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