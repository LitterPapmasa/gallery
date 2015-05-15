<?php require_once 'fun.inc.php'; ?>
<div>
    <h3>
        <?php printError('file'); ?>
    </h3>
</div>
<form action="fileload.php" method="post" enctype="multipart/form-data">
    You can upload an image <input type="file" name="image" />
    <input type="submit" value="upload" name="submit"/>
    <sup>Upload image limit 5MB</sup>
</form>
<hr>