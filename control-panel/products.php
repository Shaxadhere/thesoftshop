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
                <form action="controllers/Product.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="ProductName">Product Name</label>
                            <input required type="text" name="ProductName" class="form-control" id="ProductName" placeholder="Please type product name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Price">Price (if it doesn't varies with varients)</label>
                            <input required type="number" name="Price" class="form-control" id="Price" placeholder="Please type price">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ProductDescription">Product Description</label>
                            <textarea name="ProductDescription" id="ProductDescription" class="form-control" rows="2" placeholder="Please type product description.."></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ProductSlug">Product Slug</label>
                            <input required type="text" name="ProductSlug" class="form-control" id="ProductSlug" placeholder="Please type product slug">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Categories">Select Categories</label>
                            <select required id="Categories" name="Categories[]" style="color:blue" class="form-control categories-input" multiple="multiple">
                                <option label="Select Categories"></option>
                                <?php
                                include_once('models/category-model.php');
                                $CategoryModel = new Category();
                                $CategoryList = $CategoryModel->List();
                                while ($row = mysqli_fetch_array($CategoryList)) {
                                    echo "<option value='$row[CategoryName]'>$row[CategoryName]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ProductImages">Product Images</label>
                            <div class="custom-file">
                                <input required type="file" name="ProductImages[]" class="custom-file-input" id="ProductImages" multiple>
                                <label class="custom-file-label" for="customFile">Upload Product Images</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ProductTags">Product Tags (Comma Seperated)</label>
                            <input type="text" name="ProductTags" class="form-control" id="ProductTags" placeholder="watch, earring, diary">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <ul class="list-group">
                                <li id="" class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Size</strong></div>
                                        <div class="col-md-3"><strong>Color</strong></div>
                                        <div class="col-md-3"><strong>Quantity</strong></div>
                                        <div class="col-md-3">
                                            <strong>Price (if it varies)</strong>
                                            <button class="btn btn-link" type="button" id="AddRowBtn" style="padding:0 !important; float:right !important;">Add Row</button>
                                        </div>
                                    </div>
                                </li>
                                <li id="QtyRowContainer" class="list-group-item">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <select required id="Sizes" name="Sizes[]" style="color:blue" class="form-control sizes-input">
                                                <option label="Select Size"></option>
                                                <?php
                                                include_once('models/size-model.php');
                                                $SizeModel = new Size();
                                                $SizesList = $SizeModel->List();
                                                while ($row = mysqli_fetch_array($SizesList)) {
                                                    echo "<option value='$row[PK_ID]'>$row[SizeValue]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select required id="Colors" name="Colors[]" style="color:blue" class="form-control colors-input">
                                                <option label="Select Color"></option>
                                                <?php
                                                include_once('models/color-model.php');
                                                $ColorModel = new Color();
                                                $ColorList = $ColorModel->List();
                                                while ($row = mysqli_fetch_array($ColorList)) {
                                                    echo "<option value='$row[PK_ID]'>$row[ColorName]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input required style="height:28px !important" type="number" name="Quantity[]" class="form-control" id="Quantity" placeholder="Enter quantity">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input required style="height:28px !important" type="number" name="PriceVarient[]" class="form-control" id="Price" placeholder="Enter price if it varies">
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                        <th class="wd-20p">Price</th>
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
                        $ProductDetails = $ProductModel->FilterWithAttributesByProductID(base64_encode($row['PK_ID']));
                        $Colors = array();
                        $ColorCodes = array();
                        $Sizes = array();
                        $PriceVarient = array();
        
                        while ($Deatil = mysqli_fetch_array($ProductDetails)) {
                            array_push($Colors, $Deatil['ColorName']);
                            array_push($ColorCodes, $Deatil['ColorCode']);
                            array_push($Sizes, $Deatil['SizeValue']);
                            array_push($PriceVarient, $Deatil['PriceVarient']);
                        }
                        $ProductDetailsCount = count($PriceVarient);
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['ProductName'] ?></td>
                            <td><?= $row['ProductSlug'] ?></td>
                            <td><?=($row['PriceVary'] != 1) ? $row['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1]?></td>
                            <td>
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropleftMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary" href="view-product?product=<?= base64_encode($row['PK_ID']) ?>">View Details</a>
                                    <a class="dropdown-item text-danger" href="#DeletProduct" data-toggle="modal" data-id="<?= base64_encode($row['PK_ID']) ?>">Delete</a>
                                    <div class="wd-200 pd-15">
                                        <p><strong>Created By: </strong>System</p>
                                        <p class="mb-0"><strong>Created At: </strong><?= date('D, d M, Y', strtotime($row['CreatedAt'])) ?></p>
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
<div class="modal fade" id="DeletProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalTitle">Are you sure you want to delete this?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" id="ModalCancelButton" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" data-id="" id="ConfirmDeleteProduct" class="btn btn-danger tx-13">Yes, Delete</button>
            </div>
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
            url: "controllers/Product",
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

    //Add Row
    $(document).on('click', '#AddRowBtn', function() {
        var index = $('#QtyRowContainer .form-row').length
        $.ajax({
            type: "GET",
            url: "components/ProductQuantityRow",
            data: {
                Index: index
            },
            success: function(response) {
                $('#QtyRowContainer').append(response)
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
            },
            error: function(error) {
                console.log("Error in connection: " + error)
            }
        })
    })

    //delete product confirmation modal
    $('#DeletProduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var productId = button.data('id')
        $('#ConfirmDeleteProduct').attr('data-id', productId)
    })

    //confirm deletion of product
    $(document).on('click', '#ConfirmDeleteProduct', function() {
        var productId = $(this).data('id')
        $.ajax({
            type: "POST",
            url: "controllers/Product",
            data: {
                DeleteProduct: true,
                ProductID: productId
            },
            success: function(response) {
                if (response == true) {
                    window.location.reload()
                } else {
                    var result = JSON.parse(response)
                    $('#errors').html(result[0])
                }
            },
            error: function(error) {
                console.log("Error in connection: " + error)
            }
        })
    })
</script>