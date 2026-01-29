<?php
session_start();
?>

<h1>Home Page</h1>

<?php if (isset($_SESSION['user_id'])): ?>
    <p>Welcome!</p>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
<?php endif; ?>