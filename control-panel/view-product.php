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
                            <input required type="text" name="ProductName" class="form-control" id="ProductName" placeholder="Please type product name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Price">Price (in rupees)</label>
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
                                        <div class="col-md-4"><strong>Size</strong></div>
                                        <div class="col-md-4"><strong>Color</strong></div>
                                        <div class="col-md-4">
                                            <strong>Quantity</strong>
                                            <button class="btn btn-link" type="button" id="AddRowBtn" style="padding:0 !important; float:right !important;">Add Row</button>
                                        </div>
                                    </div>
                                </li>
                                <li id="QtyRowContainer" class="list-group-item">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
                                            <input required style="height:28px !important" type="number" name="Quantity[]" class="form-control" id="Quantity" placeholder="Enter quantity">
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
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>