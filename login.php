<?php
require_once "classes/User.php";

$user = new User();

if ($_POST) {
    if ($user->login($_POST['email'], $_POST['password'])) {
        header("Location: index.php");
    } else {
        echo "Login failed";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
