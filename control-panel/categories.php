<?php
include_once('web-config.php');
getHeader("Categories", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot()."/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form>
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
                                <input type="file" name="CategoryImages" class="custom-file-input" id="CategoryImages">
                                <label class="custom-file-label" for="customFile">Upload Category Images</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="CategoryTags">Category Tags (Comma Seperated)</label>
                            <input type="text" class="form-control" id="CategoryTags" placeholder="watch, discount, aesthetic..">
                        </div>
                    </div>
                    <button name="SaveCategory" type="submit" class="btn btn-primary">Submit Form</button>
                </form>
            </div>
        </div>

        <hr>
        <h2>Categories</h2>
        <div data-label="Categories" class="main-table">
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