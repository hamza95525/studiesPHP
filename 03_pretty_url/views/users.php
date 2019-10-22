<html>
<head>
    <?php include("../public/index.php") ?>
    <title>Pretty URL</title>

    <link rel="stylesheet" type="text/css" href="../public/style.css"/>
</head>
<body>
<div>
    <a href="home">Home</a>
    <a href="about">About</a>
    <a href="users">Users</a>
</div>
<p>Users:</p>
<ol>
    <?php foreach ($example_users as $user_id => $user) { ?>
        <li><a href="user.php?id=<?= $user_id ?>"><?= $user['name'] ?></a></li>
    <?php } ?>
</ol>
</body>
</html>