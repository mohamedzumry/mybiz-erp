<?php

// get data from bootstrap data-item-id attribute


$conn = $GLOBALS['conn'];


// Prepare the DELETE statement
$stmtDelete = $conn->prepare("DELETE FROM item WHERE id = ?");

// Check for errors
if ($stmtDelete === false) {
    echo "Prepared statements Error: " . $conn->error;
}

// Bind parameters
$stmtDelete->bind_param("i", $itemId);

// Execute statement
$stmtDelete->execute();

// Check for errors
if ($stmtDelete->error) {
    echo "Execute Error: " . $stmtDelete->error;
} else {
    echo "Item deleted successfully!";
    header("Location: /mybiz-erp/pages/items.php");
    exit();
}

// Close statement
$stmtDelete->close();

// Close connection
$conn->close();