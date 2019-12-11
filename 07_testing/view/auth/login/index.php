<?php
if(isset($_SESSION['wrongpassword'])) {
    echo $_SESSION['wrongpassword'];
    unset($_SESSION['wrongpassword']);
}
?>
<h2>Login</h2>

<form method="post">
    <input type = "text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo ''; ?>">
    <br>
    <input type = "text" name="password" >
    <br>

    <input type="submit" value="Enter" name="loginbutton">

</form>