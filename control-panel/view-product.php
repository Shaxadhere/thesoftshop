<?php
include_once('web-config.php');
getHeader("View Product", "includes/header.php");
$ProductID = $_REQUEST['product'];
include_once('models/product-model.php');
$ProductModel = new Product();
include_once('models/inventory-model.php');
$InventoryModel = new Inventory();
$Product = $ProductModel->View($ProductID);
$Product = mysqli_fetch_array($Product);
$ProductImages = json_decode($Product['ProductImages']);
$Categories = json_decode($Product['Categories']);
$Tags = json_decode($Product['ProductTags']);
$Inventory = $InventoryModel->FilterByProductID(base64_encode($Product['PK_ID']));
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/products" ?>">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Product</li>
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
                <form action="Controllers/Product.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="ProductName">Product Name</label>
                            <input required type="text" name="ProductName" class="form-control" id="ProductName" placeholder="Please type product name" value="<?= $Product['ProductName'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Price">Price (in rupees)</label>
                            <input required type="number" name="Price" class="form-control" id="Price" placeholder="Please type price" value="<?= $Product['Price'] ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ProductDescription">Product Description</label>
                            <textarea name="ProductDescription" id="ProductDescription" class="form-control" rows="2" placeholder="Please type product description.."><?= $Product['ProductDescription'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ProductSlug">Product Slug</label>
                            <input required type="text" name="ProductSlug" class="form-control" id="ProductSlug" placeholder="Please type product slug" value="<?= $Product['ProductSlug'] ?>">
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
                                    if (in_array($row['CategoryName'], $Categories)) {
                                        echo "<option value='$row[CategoryName]' selected>$row[CategoryName]</option>";
                                    } else {
                                        echo "<option value='$row[CategoryName]'>$row[CategoryName]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ProductTags">Product Tags (Comma Seperated)</label>
                            <input type="text" name="ProductTags" class="form-control" id="ProductTags" placeholder="watch, earring, diary" value="<?= implode(", ", $Tags); ?>">
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col-md-2 col-4">
                            <label for="ProductTags">Product Images</label>
                        </div>
                    </div>
                    <div class="form-row mb-3" id="images-container">
                        <?php
                        foreach ($ProductImages as $item) {
                        ?>
                            <div class="col-md-2 col-6 single-image" style="padding-bottom: 10px;">
                                <img style="height: 100px;object-fit: cover;width:100%;padding 1px" src="../uploads/product-images/<?= $item ?>" class="img-fit-cover" alt="Responsive image">
                                <div class="btn-group" style="width:100%">
                                    <a download target="_blank" href="../uploads/product-images/<?= $item ?>" class="btn btn-dark btn-icon download-image"><i data-feather="download"></i></a>
                                    <a href="" class="btn btn-dark btn-icon move-image"><i data-feather="move"></i></a>
                                    <a href="" class="btn btn-dark btn-icon delete-image"><i data-feather="trash-2"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <ul class="list-group">
                                <li id="" class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4"><strong>Size</strong></div>
                                        <div class="col-md-4"><strong>Color</strong></div>
                                        <div class="col-md-4">
                                            <strong>Quantity</strong>
                                            <button class="btn btn-link" type="button" id="AddRowBtn" style="padding:0 !important; float:right !important;">Add Row</button>
                                        </div>
                                    </div>
                                </li>
                                <li id="QtyRowContainer" class="list-group-item">
                                    <?php
                                    $index = 1;
                                    while ($inventoryItem = mysqli_fetch_array($Inventory)) {
                                        // echo $inventoryItem['SizeID'];
                                    ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <select data-select2-id="Size<?= $index ?>" required id="Sizes<?= $index ?>" name="Sizes[]" style="color:blue" class="form-control sizes-input">
                                                    <option label="Select Size"></option>
                                                    <?php
                                                    include_once('models/size-model.php');
                                                    $SizeModel = new Size();
                                                    $SizesList = $SizeModel->List();
                                                    while ($row = mysqli_fetch_array($SizesList)) {
                                                        if ($inventoryItem['SizeID'] == $row['PK_ID']) {
                                                            echo "<option selected value='$row[PK_ID]'>$row[SizeValue]</option>";
                                                        } else {
                                                            echo "<option value='$row[PK_ID]'>$row[SizeValue]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select data-select2-id="Color<?= $index ?>" required id="Colors<?= $index ?>" name="Colors[]" style="color:blue" class="form-control colors-input">
                                                    <option label="Select Color"></option>
                                                    <?php
                                                    include_once('models/color-model.php');
                                                    $ColorModel = new Color();
                                                    $ColorList = $ColorModel->List();
                                                    while ($row = mysqli_fetch_array($ColorList)) {
                                                        if ($inventoryItem['ColorID'] == $row['PK_ID']) {
                                                            echo "<option selected value='$row[PK_ID]'>$row[ColorName]</option>";
                                                        } else {
                                                            echo "<option value='$row[PK_ID]'>$row[ColorName]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input value="<?= $inventoryItem['Quantity'] ?>" required style="height:28px !important" type="number" name="Quantity[]" class="form-control" id="Quantity<?= $index ?>" placeholder="Enter quantity">
                                            </div>
                                        </div>
                                    <?php
                                        $index++;
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button name="SaveProduct" type="submit" class="btn btn-primary">Save Product</button>
                </form>
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

    //Add Row
    $(document).on('click', '#AddRowBtn', function() {
        var index = $('#QtyRowContainer .form-row').length
        $.ajax({
            type: "GET",
            url: "Components/ProductQuantityRow",
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

    $(function() {
        $("#images-container").sortable({
            placeholder: "ui-state-highlight"
        });
        $("#images-container").disableSelection();
    });
</script>