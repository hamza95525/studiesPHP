<h2>Register</h2>

<form method="post">
    <input type="text" name="id" id="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']; else echo ''; ?>">
    <br>
    <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo ''; ?>">
    <br>
    <input type="text" name="surname" id="surname" value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; else echo ''; ?>">
    <br>
    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo ''; ?>">
    <br>
    <input type="text" name="password" id="password" value="<?php echo ''; ?>">
    <br>
    <input type="text" name="password_confirmation" id="password_confirmation" value="<?php echo ''; ?>">
    <br><br>

    <input type="submit" value="Create" name="submitbutton">

</form>
