<form id="uploadForm" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <ul>
        <li><input multiple name="image[]" type="file" value="choose a file"></li>
        <li><input name="upload" type="submit" value="upload"></li>
    </ul>
    <a href="/gallery.php">go to gallery</a>
</form>
