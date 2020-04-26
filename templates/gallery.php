<?php

require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

    <div class="container">
        <form id="removeFiles">
            <ul>
                <?php
                $images = array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . '/upload'), ['.', '..']);
                if (file_exists(UPLOAD_PATH) && count($images) > 0) {
                    foreach ($images as $image) :
                        if (!in_array($image, ['.', '..'])) : ?>
                            <li class="item">
                                <img src="<?= '/upload/' . $image ?>" alt="">
                                <p class="imageName">Имя файла: <span><?= $image ?></span></p>
                                <p>Размер файла: <?= filesProp\getSize(UPLOAD_PATH . $image) ?></p>
                                <p>Время загрузки: <?= filesProp\getTimeUpload(UPLOAD_PATH . $image) ?></p>
                                <label>
                                    <input name="check" type="checkbox">Отметить для удаления
                                </label>
                            </li>
                        <?php
                        endif;
                    endforeach;
                } ?>
            </ul>
            <div class="submit">
                <input id="remove" type="submit" value="Удалить выделенные">
            </div>
        </form>
    </div>
    <a id="home" href="/">Главная</a>

<?php
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html';
