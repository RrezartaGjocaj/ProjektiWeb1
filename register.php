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
     <input type="text" name="surname" placeholder="Surname" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password" placeholder="Confirm password" required>
    <input type="telephone" placeholder="Telephone number" required>
    <button type="submit">Register</button>
 </form>

</body>
</html>