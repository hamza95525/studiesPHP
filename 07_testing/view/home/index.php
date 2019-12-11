<?php

if(isset($_SESSION["error"])){
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
}

elseif(isset($_SESSION["valid"])){
    echo $_SESSION["valid"];
    unset($_SESSION["valid"]);
}

elseif(isset($_SESSION["email!exist"])){
    echo $_SESSION["emailNoexist"];
    unset($_SESSION["emailNoexist"]);
}

elseif(isset($_SESSION['loggedout'])){
    echo $_SESSION['loggedout'];
    unset($_SESSION['loggedout']);
}

echo "<h1 class = 'welcome'>Welcome!</h1>";
?>