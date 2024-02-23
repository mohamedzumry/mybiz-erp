<?php
// Add the database connection
require "../dbconn.php";
$conn = $GLOBALS['conn'];
?>

<!-- Add New Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm" method="post" action="../dbservices/add_new_item.php">
                    <div class="mb-3">
                        <label for="itemCode" class="form-label">Item Code</label>
                        <input type="text" class="form-control" id="itemCode" name="itemCode" required>
                    </div>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="itemName" name="itemName" required>
                    </div>
                    <div class="mb-3">
                        <label for="itemCategory" class="form-label">Item Category</label>
                        <select class="form-select" id="itemCategory" name="itemCategory" required>
                            <option value="">Select Category</option>
                            <?php
                            // Connect to the database and fetch the item category data
                            $result = mysqli_query($conn, "SELECT * FROM item_category");

                            // Loop through the data and display each category in a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["category"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="itemSubCategory" class="form-label">Item Sub Category</label>
                        <select class="form-select" id="itemSubCategory" name="itemSubCategory" required>
                            <option value="">Select Sub Category</option>
                            <?php
                            // Connect to the database and fetch the item sub category data
                            $result = mysqli_query($conn, "SELECT * FROM item_subcategory");

                            // Loop through the data and display each sub category in a table row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["sub_category"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="unitPrice" class="form-label">Unit Price</label>
                        <input type="number" step="0.01" class="form-control" id="unitPrice" name="unitPrice" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addItemForm" class="btn btn-primary">Add Item</button>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>

<?php
// Close the database connection
mysqli_close($conn);
?>