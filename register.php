<?php
require_once "classes/User.php";

$user = new User();

if ($_POST) {
    $user->register($_POST['name'], $_POST['email'], $_POST['password']);
    header("Location: login.php");
}
?>
<html>
<body>

  <form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
 </form>

</body>
</html>