<?php
require_once "../dbconn.php";

$pageTitle = "Items";
include "../header.php";
$conn = $GLOBALS['conn'];
?>
<?php

// Get the item ID from the URL parameter
$itemId = isset($_GET['itemId']) ? intval($_GET['itemId']) : 0;

// Retrieve the item data from the database
$result = mysqli_query($conn, "SELECT * FROM item WHERE id = $itemId");
$itemRow = mysqli_fetch_array($result);
?>


<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/mybiz-erp">Assignment</a>
            <form class="ms-auto">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addItemModal">
                    <i class="bi bi-file-plus"></i> Add New Item
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Body area -->
<div class="container mt-5">
    <form id="updateItemForm" method="post" action="../dbservices/update_item.php">
        <div class="mb-3">
            <label for="itemCode" class="form-label">Item Code</label>
            <input type="text" class="form-control" id="itemCode" name="itemCode" value="<?php echo $itemRow["item_code"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="itemName" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="itemName" name="itemName" value="<?php echo $itemRow["item_name"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="itemCategory" class="form-label">Item Category</label>
            <select class="form-select" id="itemCategory" name="itemCategory" required>
                <option value="">Select Category</option>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM item_category");

                // Loop through the data and display each category in a table row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'";
                    if ($row["id"] == $itemRow["item_category"]) {
                        echo " selected";
                    }
                    echo ">" . $row["category"] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="itemSubCategory" class="form-label">Item Sub Category</label>
            <select class="form-select" id="itemSubCategory" name="itemSubCategory" required>
                <option value="">Select Sub Category</option>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM item_subcategory");

                // Loop through the data and display each sub category in a table row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["id"] . "'";
                    if ($row["id"] == $itemRow["item_subcategory"]) {
                        echo " selected";
                    }
                    echo ">" . $row["sub_category"] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $itemRow["quantity"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="unitPrice" class="form-label">Unit Price</label>
            <input type="number" step="0.01" class="form-control" id="unitPrice" name="unitPrice" value="<?php echo $itemRow["unit_price"]; ?>" required>
        </div>
        <input type="hidden" id="itemId" name="itemId" value="<?php echo $itemId; ?>">
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>



<?php
include "../footer.php";
// Close the database connection
$conn->close();

?>