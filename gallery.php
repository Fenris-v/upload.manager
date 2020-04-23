<?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

    <div class="container">
        <form action="#" method="post" id="removeFiles">
            <ul>
                <?php
                if (
                        file_exists($uploadPath) &&
                        count(scandir($_SERVER['DOCUMENT_ROOT'] . '/upload')) > 2
                ) {
                    $images = scandir($_SERVER['DOCUMENT_ROOT'] . '/upload');
                    for ($i = 2; $i < count($images); $i++): ?>
                        <li class="item">
                            <img src="<?= '/upload/' . $images[$i] ?>" alt="">
                            <p><?= $images[$i] ?></p>
                            <label>
                                <input name="check" type="checkbox">Check for delete
                            </label>
                        </li>
                    <?php endfor;
                } ?>
            </ul>
            <div class="submit">
                <input type="submit" value="remove">
            </div>
        </form>
    </div>
    <a id="home" href="/">go home</a>

<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html';
