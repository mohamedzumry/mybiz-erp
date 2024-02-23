<?php
require_once "../dbconn.php";
$conn = $GLOBALS['conn'];

// Prepare the INSERT statement
$stmtInsert = $conn->prepare("INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price) VALUES (?, ?, ?, ?, ?, ?)");

// Check for errors
if ($stmtInsert === false) {
    echo "Prepared statements Error: " . $conn->error;
}

// Bind parameters
$stmtInsert->bind_param("ssiiii", $itemCode, $itemName, $itemCategory, $itemSubCategory, $quantity, $unitPrice);

// Set parameters values
$itemCode = $_POST['itemCode'];
$itemName = $_POST['itemName'];
$itemCategory = $_POST['itemCategory'];
$itemSubCategory = $_POST['itemSubCategory'];
$quantity = $_POST['quantity'];
$unitPrice = $_POST['unitPrice'];

// Execute statement
$stmtInsert->execute();

// Check for errors
if ($stmtInsert->error) {
    echo "Execute Error: " . $stmtInsert->error;
} else {
    echo "New item added successfully!";
    header("Location: /mybiz-erp/pages/items.php");
    exit();
}

// Close statement
$stmtInsert->close();

// Close connection
$conn->close();
