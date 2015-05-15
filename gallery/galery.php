
<div class="gallery">
    <h1> Welcome to our gallery</h1>
<?php $files = getFiles($path); ?>
<?php $files = getImagesOnly($files,['jpg', 'jpeg', 'png', 'gif']); ?>
<?php foreach($files as $file): ?>
    <div>
        <img src="<?php echo './'.$folder.'/'.$file; ?>" alt=""/>
        <p><?php echo $file; ?></p>
    </div>
<?php endforeach ; ?>
</div>
