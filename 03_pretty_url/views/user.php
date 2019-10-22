<html>
<head>
    <?php include("users.php");?>
    <title>Pretty URL</title>

    <link rel="stylesheet" type="text/css" href="../public/style.css"/>
</head>
<body>
<div>
    <a href="home">Home</a>
    <a href="about">About</a>
    <a href="users">Users</a>
</div>
<p>User:</p>
<p><strong>Name:</strong> <?= $user['name']?></p>
<p><strong>Surname:</strong> <?= $user['surname']?></p>
<p><strong>Age:</strong> <?= $user['age']?></p>
</body>
</html>