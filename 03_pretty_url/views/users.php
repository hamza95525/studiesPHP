<p>Users:</p>
<ol>
    <?php foreach ($example_users as $user_id => $user) { ?>
        <li><a href="/user/<?= $user_id ?>"><?= $user['name'];?></a></li>
    <?php } ?>
</ol>