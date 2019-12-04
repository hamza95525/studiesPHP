<div>
    <a href="/home">Home</a>
    <a href="/demo">Demo</a>
    <a href="/about">About</a>
    <a href="/users">Users</a>
<?php

if(isset($_SESSION['login'])) {
    $user = unserialize($_SESSION['login']);
    echo "<a href='/auth/logout'>Logout</a>";
    echo "<br><br>";
    echo "Welcome back " . $user->name . "!";
    echo "<h3 class='user'>  " . $user->name . ' ' . $user->surname . " . </h3>";
}
else{
    echo "<a href='/auth/login'>Login</a>";
    echo "<a href='/auth/register'>Register</a>";
    echo "</div>";
}
?>