<?php
include_once('web-config.php');
getHeader("Inventory", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <h2>Inventory</h2>
        <div data-label="Inventory" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.No</th>
                        <th class="wd-25p">Product Name</th>
                        <th class="wd-25p">Color</th>
                        <th class="wd-25p">Size</th>
                        <th class="wd-20p">Quantity</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('models/inventory-model.php');
                    $InventoryModel = new Inventory();
                    $InventoryList = $InventoryModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($InventoryList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['ProductName'] ?></td>
                            <td><?= $row['ColorName'] ?></td>
                            <td><?= $row['SizeValue'] ?></td>
                            <td><?= $row['Quantity'] ?></td>
                            <td>
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropleftMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary" data-id="<?= base64_encode($row['InventoryID']) ?>" href="#AddQuantity" data-toggle="modal">Update Quantity</a>
                                    <div class="wd-200 pd-15">
                                        <p><strong>Last Updated By: </strong>Admin</p>
                                        <p class="mb-0"><strong>Last Updated At: </strong><?= $row['CreatedAt'] ?></p>
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
<div class="modal fade" id="AddQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalTitle">Modal Title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Quantity</label>
                <input class="form-control" type="number" name="Quantity" value="" id="ModalQuantity" />
            </div>
            <div class="modal-footer">
                <button type="button" id="ModalCancelButton" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" data-id="" id="ModalSaveChanges" class="btn btn-primary tx-13">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>
<script>
    //add quantity button handle
    $('#AddQuantity').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var inventoryId = button.data('id')
        $.ajax({
            type: "POST",
            url: "controllers/Inventory",
            data: {
                FetchInventory: true,
                InventoryID: inventoryId
            },
            success: function(response) {
                var result = JSON.parse(response)
                if (result['success'] == true) {
                    var inventory = result['inventory']
                    $('#ModalTitle').html(inventory['ProductName'])
                    $('#ModalQuantity').val(inventory['Quantity'])
                    $('#ModalSaveChanges').data('id', btoa(inventory['InventoryID']))
                }

            },
            error: function(error) {
                console.log("Error in connection: " + error)
            }
        })
    })

    //Save Changes Update Quantity
    $(document).on('click', '#ModalSaveChanges', function(){
        var id = $(this).data('id')
        var quantity = $('#ModalQuantity').val()
        $.ajax({
            type: "POST",
            url: "controllers/Inventory",
            data: {
                UpdateInventory: true,
                InventoryID: id,
                Quantity: quantity
            },
            success: function(response){
                if(response == true){
                    location.reload()
                    // $('#ModalCancelButton').click()
                }
            },
            error: function(error){
                console.log("Error in connection: " + error)
            }
        })
    })
</script>