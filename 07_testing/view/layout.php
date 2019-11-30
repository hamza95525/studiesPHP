<?php
    switch($file){      //in this switch statement title of the page is setted
        case '../view/home/index.php':
            $title = 'Homepage';
            break;
        case '../view/auth/register/index.php':
            $title = 'Register';
            break;
}
?>

<html>
<head>
    <title><?php if(isset($title)) echo $title; else echo "PDO"; ?></title>

    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php require("menu.php"); ?>
<?php require($file);?>
</body>
</html>