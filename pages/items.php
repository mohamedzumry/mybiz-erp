<?php
require_once "../dbconn.php";

$pageTitle = "Items";
include "../header.php";
$conn = $GLOBALS['conn'];
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
    <!-- Search bar -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="itemSearch" onkeyup="myFunction();" placeholder="Search Items by Name">
    </div>

    <!-- Customer list -->
    <table id="itemTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database and fetch the customer data
            $result = mysqli_query($conn, "SELECT * FROM item");

            // Loop through the data and display each customer in a table row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["item_code"] . "</td>";
                echo "<td>" . $row["item_name"] . "</td>";
                // get the category name
                $category_id = $row["item_category"];
                $categorytmp = mysqli_query($conn, "SELECT category FROM item_category WHERE id = $category_id limit 1");
                $categoryRow = mysqli_fetch_array($categorytmp);
                echo "<td>" . $categoryRow["category"] . "</td>";
                // get the category name
                $sub_category_id = $row["item_subcategory"];
                $subCategorytmp = mysqli_query($conn, "SELECT sub_category FROM item_subcategory WHERE id = $sub_category_id limit 1");
                $subCategoryRow = mysqli_fetch_array($subCategorytmp);
                echo "<td>" . $subCategoryRow["sub_category"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["unit_price"] . "</td>";
                echo "<td>" .
                    '<a href="./update_item.php?itemId='.$row["id"].'" class="btn btn-outline-warning" ><i class="bi bi-pencil-square"></i></a>'
                    . " | " .
                    '<button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteItemModal" data-item-id="'.$row["id"].'"><i class="bi bi-trash-fill"></i></button>'
                    . "</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>
<script>
    function getItem(itemId) {
        // send the item id as a "get" request to the server
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "dbservices/get_item.php?itemId=" + itemId, true);
    }

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("itemSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("itemTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<!-- Add New Customer Modal -->
<?php include "../includes/modals/add_new_item_modal.php"; ?>
<?php require_once "../includes/modals/delete_item_modal.php"; ?>


<?php include "../footer.php"; ?>