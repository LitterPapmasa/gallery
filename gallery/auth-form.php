<?php require 'fun.inc.php'; ?>
<div>
    <h3>
        <?php printError('message');?>
    </h3>
</div>
<form action="auth.php" method="post">
    Login:<input type="text" name="login" />
    Password:<input type="password" name="pass" />
    <input type="submit" value="GO" />
</form>