<?php
include_once('../web-config.php');
$Index = $_REQUEST['Index'];
$Index = intval($Index) + 1;
?>
<div class="form-row">
    <div class="form-group col-md-3">
        <select data-select2-id="Size<?= $Index ?>" id="Sizes" name="Sizes[]" style="color:blue" class="form-control sizes-input">
            <option label="Select Size"></option>
            <?php
            include_once('../models/size-model.php');
            $SizeModel = new Size();
            $SizesList = $SizeModel->List();
            while ($row = mysqli_fetch_array($SizesList)) {
                echo "<option value='$row[PK_ID]'>$row[SizeValue]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group col-md-3">
        <select data-select2-id="Color<?= $Index ?>" id="Colors" name="Colors[]" style="color:blue" class="form-control colors-input">
            <option label="Select Color"></option>
            <?php
            include_once('../models/color-model.php');
            $ColorModel = new Color();
            $ColorList = $ColorModel->List();
            while ($row = mysqli_fetch_array($ColorList)) {
                echo "<option value='$row[PK_ID]'>$row[ColorName]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group col-md-3">
        <input style="height:28px !important" type="number" name="Quantity[]" class="form-control" id="Quantity" placeholder="Enter quantity">
    </div>
    <div class="form-group col-md-3">
        <input style="height:28px !important" type="number" name="PriceVarient[]" class="form-control" id="Price" placeholder="Enter price if it varies">
    </div>
</div>