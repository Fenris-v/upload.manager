<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

    <div class="container">
        <form id="removeFiles">
            <ul>
                <?php
                if (
                    file_exists($uploadPath) &&
                    count(scandir($_SERVER['DOCUMENT_ROOT'] . '/upload')) > 2
                ) {
                    $images = scandir($_SERVER['DOCUMENT_ROOT'] . '/upload');
                    asort($images);
                    foreach ($images as $image) :
                        if ($image != '.' && $image != '..') : ?>
                            <li class="item">
                                <img src="<?= '/upload/' . $image ?>" alt="">
                                <p><?= $image ?></p>
                                <p>Size: <?= filesProp\getSize($uploadPath . $image) ?></p>
                                <p>Upload time: <?= filesProp\getTimeUpload($uploadPath . $image) ?></p>
                                <label>
                                    <input name="check" type="checkbox">Check for delete
                                </label>
                            </li>
                        <?php
                        endif;
                    endforeach;
                } ?>
            </ul>
            <div class="submit">
                <input id="remove" type="submit" value="remove">
            </div>
        </form>
    </div>
    <a id="home" href="/">go home</a>

<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html';
