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
<body>

<form method="POST"  onsubmit="return validateLogin()">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

 <script scr="javascript.js"></script>
</body>

