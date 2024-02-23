<?php

require "../dbconn.php";



// Get the item ID from the URL parameter
$itemId = isset($_GET['itemId']) ? intval($_GET['itemId']) : 1;

// Connect to the database
$conn = $GLOBALS['conn'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the item data from the database
$result = mysqli_query($conn, "SELECT * FROM item WHERE id = $itemId");
$itemRow = mysqli_fetch_array($result);

// Close the database connection
$conn->close();

?>

<div class="modal fade" id="updateItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="editItemForm" action="../dbservices/update_item.php" method="post">
                    <div class="mb-3">
                        <label for="editItemCode" class="form-label">Item Code</label>
                        <input type="text" class="form-control" id="editItemCode" name="itemCode" required value="$itemRow['item_code']">
                    </div>
                    <div class="mb-3">
                        <label for="editItemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="editItemName" name="itemName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editItemCategory" class="form-label">Item Category</label>
                        <select class="form-select" id="editItemCategory" name="itemCategory" required>
                            <option value="">Select Category</option>
                            <?php
                            // Connect to the database and fetch the item category data
                            $conn = mysqli_connect("localhost", "root", "", "assignment");
                            $result = mysqli_query($conn, "SELECT * FROM item_category");

                            // Loop through the data and display each category in a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["category"] . "</option>";
                            }


                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editItemSubCategory" class="form-label">Item Sub Category</label>
                        <select class="form-select" id="editItemSubCategory" name="itemSubCategory" required>
                            <option value="">Select Sub Category</option>
                            <?php
                            // Connect to the database and fetch the item sub category data
                            $conn = mysqli_connect("localhost", "root", "", "assignment");
                            $result = mysqli_query($conn, "SELECT * FROM item_subcategory");

                            // Loop through the data and display each sub category in a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["sub_category"] . "</option>";
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editQuantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUnitPrice" class="form-label">Unit Price</label>
                        <input type="number" step="0.01" class="form-control" id="editUnitPrice" name="unitPrice" required>
                    </div>
                    <input type="hidden" id="editItemId" name="itemId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editItemBtn">Update Item</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Populate the form fields with the retrieved item data
        $('#editItemCode').val('<?php echo $itemRow["item_code"]; ?>');
        $('#editItemName').val('<?php echo $itemRow["item_name"]; ?>');
        $('#editItemCategory').val('<?php echo $itemRow["item_category"]; ?>');
        $('#editItemSubCategory').val('<?php echo $itemRow["item_subcategory"]; ?>');
        $('#editQuantity').val('<?php echo $itemRow["quantity"]; ?>');
        $('#editUnitPrice').val('<?php echo $itemRow["unit_price"]; ?>');
        $('#editItemId').val('<?php echo $itemId; ?>');
    });
</script>