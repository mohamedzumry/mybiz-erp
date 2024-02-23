<?php
$pageTitle = "Assignment";
include "header.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex">
        <a class="navbar-brand" href="/mybiz-erp">
            Assignment
        </a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row vh-100">
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <a href="pages/customers.php" style="color: black;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people-fill"></i> Customers</h5>
                        <p class="card-text">View, edit, update or deleted Customers from here</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <a href="pages/items.php" style="color: black;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bag-fill"></i> Items</h5>
                        <p class="card-text">View, edit, update or deleted Items from here</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <a href="pages/reports.php" style="color: black;">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-earmark-bar-graph-fill"></i> Reports</h5>
                        <p class="card-text">View Invoice Report, Invoice Item Report & Item Report from here</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>