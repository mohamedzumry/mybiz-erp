<?php
session_start(); // Start session at the beginning
if (isset($_SESSION['ISLOGGEDIN'])) { // Check if user is logged in
    header("Location: dashboard.php"); // Redirect to dashboard if logged in
}
require_once "../dbconn.php";

if (isset($_POST['login'])) { // Check for correct button name
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement for database query (good practice)
    $sql = "SELECT user_type FROM users WHERE username = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($user_type);

    if ($stmt->fetch()) {
        $_SESSION['ISLOGGEDIN'] = true; // Set session variable
        $_SESSION['USERTYPE'] = $user_type; // Store user type
        header("Location: dashboard.php"); // Redirect after setting session
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }

    $stmt->close();
}
?>

<?php
$pageTitle = "Login | Clove Restaurant";
include("../header.php");
// include("../dbconn.php");
?>
<div class="container">
    <form class="login-form" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <!-- <div class="form-group">
            <label for="accountType">Account Type</label>
            <select id="accountType" name="accountType">
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
        </div> -->
        <div class="form-group">
            <button type="submit" name="login" class="btn">Login</button>
            <p style="text-align: center; font-size: 12px;">No Account <a href="signup.php">Sign Up</a></p>
        </div>
        <a href="../index.php" class="button">Back to Home</a>
    </form>
</div>

<?php include("../footer.php") ?>