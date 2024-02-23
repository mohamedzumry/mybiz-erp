<?php
require_once "../dbconn.php";

// If form is submitted, process it
if (isset($_POST['create-account'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = "user"; // Hidden field value

    // Prepare SQL statement to insert user data
    $sql = "INSERT INTO users (username, user_email, user_password, user_type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $user_type);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error creating account: " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php
$pageTitle = "Sign Up | Clove Restaurant";
include("../header.php");
// include("../dbconn.php");
?>
    <?php include "../navs/main-nav.php" ?>
    <div class="container">
        <h1>Create New Account</h1>
        <form id="createAccountForm" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="create-account" class="btn">Create Account</button>
        </form>
    </div>

    