<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['email']) . "!";
} else {
    echo "Please log in first to see this page.";

    header("Location: /sporttime_template/public/admin"); 
    exit; 
}
?>

<section class="admin-dashboard">
    <h2>Dashboard</h2>
</section>
