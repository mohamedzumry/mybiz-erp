<?php
require_once "../dbconn.php";

$pageTitle = "Customers";
include "../header.php";
$conn = $GLOBALS['conn'];
?>

<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/mybiz-erp">Assignment</a>
            <form class="ms-auto">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#addCustomerModal">
                    <i class="bi bi-person-plus"></i> Add New Customer
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Body area -->
<div class="container mt-5">
    <!-- Search bar -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="customerSearch" onkeyup="myFunction();" placeholder="Search Customers First Name">
    </div>

    <!-- Customer list -->
    <table id="customerTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database and fetch the customer data
            
            $result = mysqli_query($conn, "SELECT * FROM customer");

            // Loop through the data and display each customer in a table row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["contact_no"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" .
                    '<button class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="bi bi-pencil-square"></i></button>'
                    . " | " .
                    '<button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="bi bi-trash-fill"></i></button>'
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
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("customerSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("customerTable");
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
<?php include "../includes/modals/add_new_customer_modal.php"; ?>


<?php include "../footer.php"; ?>