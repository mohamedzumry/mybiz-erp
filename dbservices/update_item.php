<?php

// Get the form data
$itemId = $_POST['itemId'];
$itemCode = $_POST['itemCode'];
$itemName = $_POST['itemName'];
$itemCategory = $_POST['itemCategory'];
$itemSubCategory = $_POST['itemSubCategory'];
$quantity = $_POST['quantity'];
$unitPrice = $_POST['unitPrice'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "assignment");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the UPDATE statement
$stmtUpdate = $conn->prepare("UPDATE item SET item_code = ?, item_name = ?, item_category = ?, item_subcategory = ?, quantity = ?, unit_price = ? WHERE id = ?");

// Check for errors
if ($stmtUpdate === false) {
    echo "Prepared statements Error: " . $conn->error;
}

// Bind parameters
$stmtUpdate->bind_param("ssiiiii", $itemCode, $itemName, $itemCategory, $itemSubCategory, $quantity, $unitPrice, $itemId);

// Execute statement
$stmtUpdate->execute();

// Check for errors
if ($stmtUpdate->error) {
    echo "Execute Error: " . $stmtUpdate->error;
} else {
    header("Location: /mybiz-erp/pages/items.php");
    function_alert("Item updated successfully!");
}

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 


// Close statement
$stmtUpdate->close();

// Close connection
$conn->close();

?>