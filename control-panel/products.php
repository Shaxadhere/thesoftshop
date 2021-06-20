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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Product</h5>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="ProductName">Product Name</label>
                            <input type="text" name="ProductName" class="form-control" id="ProductName" placeholder="Please type product name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="ProductDescription">Product Description</label>
                            <textarea class="form-control" rows="2" placeholder="Please type product description.."></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Sizes">Sizes</label>
                            <select name="Sizes" style="color:blue" class="form-control sizes-input" multiple="multiple">
                                <option label="Choose Sizes"></option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                                <option value="ExtraLarge">Extra Large</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ProductCode">Product Code</label>
                            <input type="text" name="ProductCode" class="form-control" id="ProductCode" placeholder="Please type product code">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Categories">Select Categories</label>
                            <select name="Categories" style="color:blue" class="form-control categories-input" multiple="multiple">
                                <option label="Select Categories"></option>
                                <option value="Small">Small</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ProductImages">Product Images</label>
                            <div class="custom-file">
                                <input type="file" name="ProductImages" class="custom-file-input" id="ProductImages" multiple>
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
            <table id="main-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-20p">Name</th>
                        <th class="wd-25p">Position</th>
                        <th class="wd-20p">Office</th>
                        <th class="wd-15p">Age</th>
                        <th class="wd-20p">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>$170,750</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>