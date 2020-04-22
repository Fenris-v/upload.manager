<pre>
    <?php

    var_dump($_FILES);

    if (isset($_POST['upload'])) {
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

        if (!empty($_FILES['image']['error'])) {
            echo 'Upload fail with error code: ' . $_FILES['image']['error'];
        } else {
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath);
            }

            move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath . $_FILES['image']['name']);
        }
    }

    ?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <ul>
        <li><input name="image" type="file" value="choose a file"></li>
        <li><input name="upload" type="submit" value="upload"></li>
    </ul>
</form>
</body>
</html>
